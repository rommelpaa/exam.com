<?php

namespace app\controllers\Backend;

use Yii;
use yii\web\request;

class ProductsController extends BackendController{

	
    public function actionIndex()
    {    

        $this->pageTitle					  = 'List of Products';
        $this->data['subpages']               = '@app/views/backend/products.php';  
        $this->data['leftpanel']              = $this->leftpanel;
        $this->data['data']['content']        = 'Hello World';  
       
    }

    public function actionForm()
    {   
    	$product_id						      = !empty(uri_segment(5))?base64_decode(uri_segment(5)):'';
    	$this->data['data']['results']		  = "";
    	$this->data['data']['message']		  = "";
        
    	//this is to validate if if data exist and addnew or edit
    	if($product_id!="" || !empty(Yii::$app->request->post()))
    	{
            @ini_set('memory_limit', '512M');
    		$tablename						  = "products";
    		
    		if(!empty(Yii::$app->request->post()))
    		{
                
    			$this->data['data']['alert']['type']		    = "alert-success";
    			$this->data['data']['alert']['message']		    = "";

                //for product Images
                $dirpath                        = "uploads/thumbs/";
                $dir                            = "uploads/";

                $product_image                  = Yii::$app->request->post('prod_images');

                if(!empty($_FILES['product_image']['tmp_name']))
                {
                
                    $fileupload                 = $_FILES['product_image'];
                    
                    if(!is_dir($dirpath))
                    {
                        mkdir($dirpath,0777, true);
                    }
                
                    
                    $pathinfo       = pathinfo($fileupload['name']);
                    $filename       = str_replace(' ','_',$pathinfo['filename']);
                    $filename       = date("U")."_".$filename.".".$pathinfo['extension'];
                    
                    if(move_uploaded_file($fileupload['tmp_name'] , $dir.$filename ))
                    {
                        $product_image        = $filename;

                        $this->simpleimage->load($dir.$filename);
                        $height = $this->simpleimage->getHeight();
                        $width  = $this->simpleimage->getWidth();
                        
                        $this->simpleimage->resizeToWidth(242);
                        $this->simpleimage->save($dirpath.$filename);
                        
                        
                    }
                }
                //end here

    			$save[0]		 = array(
                                        'product_image'         => $product_image,
    									'product_name'			=> Yii::$app->request->post('product_name'),
    									'product_desc'			=> stripslashes(Yii::$app->request->post('product_desc')),
    									'stock_level'			=> Yii::$app->request->post('stock_level'),
                                        'qty'                   => Yii::$app->request->post('qty'),
                                        'sku'                   => Yii::$app->request->post('sku'),
                                        'price'                 => (double)Yii::$app->request->post('price'),
                                        'warehouse_id'          => Yii::$app->request->post('selwarehouse'),
                                        'status'                => Yii::$app->request->post('selstatus')
    									
    							   );
    			if(uri_segment(4)=='add')
    			{
                    $save[0]['datecreated']                     = date('Y-m-d H:i:s');        
    				$rs_save		= $this->common->saveDataList($tablename, $save);
    				$product_id 	= Yii::$app->db->getLastInsertID();

    				$this->data['data']['alert']['message']		  = "You have successfully added new record.";
    				
				}else
				{
					$rs_save	= $this->common->updateDataList($tablename, $save, array(array('product_id' => $product_id)));
					if($rs_save)
					{
						$this->data['data']['alert']['message']		  = "You have successfully updated the record.";
    					
					}else
					{
						$this->data['data']['alert']['message']		  = "You haven't edit the record";
    					$this->data['data']['alert']['type']		  = "alert-warning";
					}
				}   

    		}
    		
    		if($product_id!='')
    		{


    			$filter							  = "WHERE product_id=$product_id";
	    		$results                          = $this->common->getDataList($tablename, $filter);
                
	    		if(!empty($results))
	    		{
                    $this->data['data']['results']	  = $results;

	    		}



    		}
    		
    		

    	}

    	$this->pageTitle					  = 'Forms > '.strtoupper(uri_segment(4));
        $this->data['subpages']               = '@app/views/backend/products_form.php';  
        $this->data['leftpanel']              = $this->leftpanel;
        $this->data['data']['content']        = '';
    }

    public function actionDelete()
    {
    	$product_id						      = !empty(uri_segment(4))?base64_decode(uri_segment(4)):'';
    	
    	$results							  = $this->common->deleteQuery('products', "product_id = $product_id");
    	if($results)
    	{
    		return $this->redirect(uri_segment(1).'/village', true);
    	}
    }

}

?>