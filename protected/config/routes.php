<?php
 use yii\web\UrlRule;
 
 return 	array(
 				//Frontend
 				''								      				    => 'Frontend/shops',
				'main/shops'								      		=> 'Frontend/shops',
				'main/<controller:\w+>'				     	  			=> 'Frontend/<controller>',
				'main/<controller:\w+>/<action:\w+>'		    		=> 'Frontend/<controller>/<action>',
				'main/<controller:\w+>/<action:\w+>/<params:.*?>'      	=> 'Frontend/<controller>/<action>',
				
 				//For Backend
				'admin'								      				=> 'Backend/products',
				'admin/<controller:\w+>'				     	  		=> 'Backend/<controller>',
				'admin/<controller:\w+>/<action:\w+>'		    		=> 'Backend/<controller>/<action>',
				'admin/<controller:\w+>/<action:\w+>/<params:.*?>'      => 'Backend/<controller>/<action>',
				

				//For AJAX
				'ajax/<controller:\w+>'						         	=> 'Ajax/<controller>',
				'ajax/<controller:\w+>/<action:\w+>'		         	=> 'Ajax/<controller>/<action>',
				'ajax/<controller:\w+>/<action:\w+>/<params:.*?>'		=> 'Ajax/<controller>/<action>',

				
				'<controller:\w+>/<action:\w+>'        			        => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<params:.*?>'  			=> '<controller>/<action>',
			);

?>