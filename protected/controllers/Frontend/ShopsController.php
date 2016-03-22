<?php

namespace app\controllers\Frontend;

use Yii;
use yii\web\request;

class ShopsController extends FrontendController{

	
    public function actionIndex()
    {    
        $limit               = 15;
        $pages               = 0;
        if(preg_match('/[?]/',uri_segment(2)))
        {
            $pages           = explode('?',uri_segment(2));
            $pages           = explode('=', $pages[1]);
            $pages           = (int)$pages[1];
            $pages           = ($pages==1)?0:$pages - 1 ;
            

        }   
        $start                                = $pages * $limit;
        
        $this->pageTitle					  = 'Shopping Cart';
        $tablename                            = "products";

        //get the total count of the products
        $qry                                  = "SELECT COUNT(product_id) as total FROM products WHERE status=1";
        $getTotal                             = $this->common->executeQuery($qry)->queryOne();
        $total                                = $getTotal['total'];
        //end here

        $pagination                           = ceil($total/$limit);
        
        

        $filter                               = "WHERE status=1 LIMIT $start, $limit";
        
        $results                              = $this->common->getDataList($tablename, $filter);

        $pages                                = $pages+1;

        $this->data['data']['results']        = $results;
        $this->data['data']['page']           = ($pages==0)?1:$pages;
        $this->data['data']['pagination']     = $pagination;

        $this->data['subpages']               = '@app/views/frontend/shops.php';  
        $this->data['leftpanel']              = $this->leftpanel;
        $this->data['data']['content']        = 'Hello World';  
       
    }

    

}

?>