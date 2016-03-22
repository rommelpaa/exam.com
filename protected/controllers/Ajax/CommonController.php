<?php

namespace app\controllers\Ajax;
use Yii;
use yii\web\request;
class CommonController extends AjaxController{

    public function actionGetproductlist()
    {
        $keyword      = !empty(Yii::$app->request->post('keyword'))?Yii::$app->request->post('keyword'):'';

        $tablename    = "products";
        $filter       = "";

        if($keyword!="")
        {
            $filter   = "WHERE product_name LIKE '%{$keyword}%' OR product_desc LIKE '%{keyword}%' OR sku LIKE '%{keyword}%'";
        }

        $result       = $this->common->getDataList($tablename, $filter);
        
        $arr_record   = array();
        if(!empty($result))
        {

            foreach($result as $row)
            {
                $tablename   = "warehouse";
                $filter      = "WHERE warehouse_id={$row['warehouse_id']}";
                $rs          = $this->common->getDataList($tablename, $filter);
                
                $arr_record[]           = array(
                                                'product_id'      => $row['product_id'],
                                                'warehouse_id'      => $row['warehouse_id'],
                                                'warehouse_name'    => !empty($rs)?$rs[0]['warehouse_name']:'',
                                                'product_image'     => $row['product_image'],
                                                'product_name'      => $row['product_name'],
                                                'product_desc'      => $row['product_desc'],
                                                'qty'               => $row['qty'],
                                                'price'             => (double)$row['price'],
                                                'stock_level'       => $row['stock_level'],
                                                'sku'               => $row['sku'],
                                                'status'            => $row['status']
                                            );

            }
            
        }

        $this->json['json']['returns']      = true;
        $this->json['json']['results']      = $arr_record;
        

    }

    public function actionGetwarehouse()
    {
        $keyword      = !empty(Yii::$app->request->post('keyword'))?Yii::$app->request->post('keyword'):'';

        $tablename    = "warehouse";
        $filter       = "";

        if($keyword!="")
        {
            $filter   = "WHERE warehouse_name LIKE '%{$keyword}%' OR warehouse_code LIKE '%{keyword}%'";
        }

        $result       = $this->common->getDataList($tablename, $filter);
        
        $this->json['json']['returns']      = true;
        $this->json['json']['results']      = $result;
        

    }

    public function actionAddtocart()
    {
        // pr(Yii::$app->session['order']);
        // die();

        $this->json['json']['returns']      = false;

        $product_id             = unserialize(base64_decode(Yii::$app->request->post('pId')));
        
        $tablename              = "products";
        $filter                 = "WHERE product_id=$product_id";
        $results                = $this->common->getDataList($tablename, $filter);
        
        if(!empty($results))
        {
            $dbqty              = $results[0]['qty'];
            $stock_level        = $results[0]['stock_level'];
            
            //this is to check if the quantity will reach the minimum stock level
            if(!empty(Yii::$app->session['order'][Yii::$app->request->post('pId')]))
            {
                $dbqty          = $dbqty - ((int)Yii::$app->session['order'][Yii::$app->request->post('pId')]['qty'] + 1);
            }
            //end here

            
            if($dbqty > $stock_level)
            {
                $arr_order                    = array();
                $validate                     = false;
                $qty                          = 1;
                if(!empty(Yii::$app->session['order']))
                {
                    
                    foreach(Yii::$app->session['order'] as $key => $value)
                    {
                        $pID                      = $key;
                        $qty                      = Yii::$app->session['order'][$key]['qty'];
                        if(Yii::$app->request->post('pId') == $pID)
                        {
                            $validate             = true;
                            $qty                  = Yii::$app->session['order'][$key]['qty'] + 1;

                        }
                        $arr_order[$key]          = array(
                                                        'qty'           => $qty,
                                                        'price'         => (double)$value['price'],
                                                        'total_amt'     => $qty * (double)$value['price']
                                                    );
                    }
                }


                $this->json['json']['returns']      = true;
                $this->json['json']['title']        = "Success";
                $this->json['json']['message']      = "You have successfully added this product to cart";

                if(!$validate)
                {
                    $product_count                = !empty(Yii::$app->session['order'])?count(Yii::$app->session['order']):0;

                    if($product_count < 5)
                    {
                        $arr_order[Yii::$app->request->post('pId')]   = array(
                                                                        'qty'           => 1,
                                                                        'price'         => (double)$results[0]['price'],
                                                                        'total_amt'     => $qty * (double)$results[0]['price']
                                                                    );
                    }else
                    {
                        $this->json['json']['returns']      = false;
                        $this->json['json']['title']        = "Error";
                        $this->json['json']['message']      = "You have reach the maximum allowed product per order.";
                    }

                    
                }
                Yii::$app->session['order']         = $arr_order;
                
            }else
            {
                $this->json['json']['title']        = "Error";
                $this->json['json']['message']      = "Error, Quantity is below Stock level (Out of stock)";
            }
        }else
        {
            $this->json['json']['title']        = "Error";
            $this->json['json']['message']      = "Error, Product does not exist!";
        }

        

    }

    public function actionReleaseorder()
    {  
        $order       = Yii::$app->session['order'];
        if(!empty($order))
        {
            //get last order_id 
            $tablename             = "`order`";
            $filter                = "ORDER BY id DESC LIMIT 1";
            $rs                    = $this->common->getDataList($tablename, $filter);
            $order_id              = 1;
            if(!empty($rs))
            {
                $order_id          = $rs[0]['id'] + 1;
            }
            foreach($order as $key => $fields)
            {
                $prod_id        = unserialize(base64_decode($key));
                $save[0]        = array(
                                    "order_id"     => $order_id,
                                    "product_id"   => $prod_id,
                                    "qty"          => $fields['qty'],
                                    "price"        => $fields['price'],
                                    "amount"       => $fields['qty'] * (double)$fields['price'],
                                    "datecreated"  => date('Y-m-d H:i:s A')
                                );
                $rs             = $this->common->saveDataList($tablename, $save);

                $updates        = $this->common->getUpdateStocks($prod_id, $fields['qty']);

            }
            unset(Yii::$app->session['order']);
            $this->json['json']['returns']    = true;
            $this->json['json']['message']    = "Order process completed";
        }
    }

    public function actionRemoveproducts()
    {
        @session_start();
        $checkbox     = Yii::$app->request->post('checkbox_prod');
        foreach($checkbox as $prod_id)
        {
            $id       = base64_encode(serialize($prod_id));
            unset($_SESSION['order'][$id]);
        }
        $this->json['json']['returns']    = true;
    }

}

?>