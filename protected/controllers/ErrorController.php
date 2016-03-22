<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Common;
use yii\web\Application;
use yii\web\request;

class ErrorController extends Controller{

	var $common 						= "";
	var $user 							= "";
    var $pageTitle                      = "";
	var $data  							= array();
	public function beforeAction()
    {
        $this->common                   = new Common;  //to load the common model;
		
        return true;
    }
    public function actionIndex()
    {    
        $this->pageTitle					  = 'Error';
        $this->data['subpages']               = '@app/views/error.php';  
        $this->data['data']['content']        = 'Error'; 
        
    }

    public function afterAction()
    {
    	return $this->renderPartial('/layouts/main',$this->data);
    }


}

?>