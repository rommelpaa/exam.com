<?php

namespace app\controllers\Ajax;

use Yii;
use yii\web\Controller;
use app\models\Common;
use yii\web\Application;
use yii\web\request;

class AjaxController extends Controller{

    var $common                         = "";
    var $json                           = "";

    public function beforeAction()
    {
        $this->common                   = new Common;  //to load the common model;
        return true;
    }


    public function afterAction()
    {
        
        return $this->renderPartial('/json',$this->json);
    }


}

?>