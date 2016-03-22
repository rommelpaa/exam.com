<?php

namespace app\controllers\Backend;

use Yii;
use yii\web\Controller;
use app\models\Common;
use app\models\SimpleImage;
use yii\web\Application;
use yii\web\request;

class BackendController extends Controller{

	var $common 						= "";
    var $simpleimage                    = "";
	var $users 							= "";
	var $data  							= array();
	var $pageTitle 						= "";
	var $leftpanel					    = '@app/views/layouts/leftpanel.php';
	
	public function beforeAction()
    {
        $this->common                   = new Common;  //to load the common model;
        $this->simpleimage              = new SimpleImage; // to load simple image on the model folder
        

        return true;
    }

    public function afterAction()
    {
       	return $this->renderPartial('/layouts/main',$this->data);
    }

}

?>