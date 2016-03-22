<?php

namespace app\controllers\Frontend;

use Yii;
use yii\web\request;

class CartController extends FrontendController{

	
    public function actionIndex()
    {    

        $this->pageTitle                      = "Shopping Cart";
        $this->data['subpages']               = '@app/views/frontend/cart.php';  
        $this->data['leftpanel']              = $this->leftpanel;
        $this->data['data']['content']        = 'Hello World';  
       
    }

    

}

?>