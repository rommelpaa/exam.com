<?php

namespace app\controllers\Backend;

use Yii;
use yii\web\request;

class WarehouseController extends BackendController{

	
    public function actionIndex()
    {    

        $this->pageTitle					  = 'List of Warehouse';
        $this->data['subpages']               = '@app/views/backend/warehouse.php';  
        $this->data['leftpanel']              = $this->leftpanel;
        $this->data['data']['content']        = 'Hello World';  
       
    }

    public function actionForm()
    {   
    	$warehouse_id						      = !empty(uri_segment(5))?base64_decode(uri_segment(5)):'';
    	$this->data['data']['results']		  = "";
    	$this->data['data']['message']		  = "";

    	//this is to validate if if data exist and addnew or edit
    	if($warehouse_id!="" || !empty(Yii::$app->request->post()))
    	{
    		$tablename						  = "warehouse";
    		
            if(!empty(Yii::$app->request->post()))
    		{
                
                
    			$this->data['data']['alert']['type']		    = "alert-success";
    			$this->data['data']['alert']['message']		    = "";


    			$save[0]		 = array(
    									'warehouse_name'		=> stripslashes(Yii::$app->request->post('warehouse_name')),
    									'warehouse_desc'		=> stripslashes(Yii::$app->request->post('warehouse_desc')),
                                        'status'                => Yii::$app->request->post('selstatus'),
    							   );
    			if(uri_segment(4)=='add')
    			{

                    $qry            = "SELECT * FROM $tablename ORDER BY warehouse_id DESC LIMIT 1";
                    $getResult      = $this->common->executeQuery($qry)->queryAll();

                    $warehouse_code = 'WH'.sprintf('%04d',1);
                    if(!empty($getResult))
                    {
                        $db_warehouse_id    = $getResult[0]['warehouse_id']+1;
                        $warehouse_code     = 'WH'.sprintf('%04d',$db_warehouse_id);
                    }

                    $save[0]['warehouse_code']                  = $warehouse_code;        
                    $save[0]['datecreated']                     = date('Y-m-d H:i:s');        
    				$rs_save		= $this->common->saveDataList($tablename, $save);
    				$warehouse_id 	= Yii::$app->db->getLastInsertID();

    				$this->data['data']['alert']['message']		  = "You have successfully added new record.";
    				
				}else
				{
					$rs_save	= $this->common->updateDataList($tablename, $save, array(array('warehouse_id' => $warehouse_id)));
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
    		
    		if($warehouse_id!='')
    		{


    			$filter							  = "WHERE warehouse_id=$warehouse_id";
	    		$results                          = $this->common->getDataList($tablename, $filter);
                
	    		if(!empty($results))
	    		{
                    $this->data['data']['results']	  = $results;

	    		}



    		}
    		
    		

    	}

    	$this->pageTitle					  = 'Forms > '.strtoupper(uri_segment(4));
        $this->data['subpages']               = '@app/views/backend/warehouse_form.php';  
        $this->data['leftpanel']              = $this->leftpanel;
        $this->data['data']['content']        = '';
    }

    public function actionDelete()
    {
    	$warehouse_id						  = !empty(uri_segment(4))?base64_decode(uri_segment(4)):'';
    	
    	$results							  = $this->common->deleteQuery('warehouse', "warehouse_id = $warehouse_id");
    	if($results)
    	{
    		return $this->redirect(uri_segment(1).'/warehouse', true);
    	}
    }

}

?>