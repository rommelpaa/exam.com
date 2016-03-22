<?php

namespace app\controllers\Frontend;

use Yii;
use yii\web\Controller;
use app\models\Common;
use app\models\SimpleImage;
use yii\web\Application;
use yii\web\request;

class FrontendController extends Controller{

	var $common 						= "";
    var $simpleimage                    = "";
	var $users 							= "";
	var $data  							= array();
	var $pageTitle 						= "";
	var $leftpanel					    = '';
	
	public function beforeAction()
    {
        $this->common                   = new Common;  //to load the common model;
        
        return true;
    }

    public function afterAction()
    {
       	return $this->renderPartial('/layouts/main',$this->data);
    }

}

?>