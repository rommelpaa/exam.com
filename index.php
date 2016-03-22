<?php
defined('YII_DEBUG') or define('YII_DEBUG', true); // must be false when set it to live


$vendorDir = __DIR__ . '/../framework/yii/2.0.4/vendor';
require_once(__DIR__ . '/protected/components/common.php');
require_once($vendorDir.'/yiisoft/yii2/requirements/YiiRequirementChecker.php');

$requirementsChecker		= new YiiRequirementChecker();
$requirements 				= array(
									array(
										'name' 			=> 'PHP Some Extension',
										'mandatory' 	=> true,
										'condition' 	=> extension_loaded('some_extension'),
										'by' 			=> 'Some application feature',
										'memo' 			=> 'PHP extension "some_extension" required',
									 )
							  );
							  
$check						= $requirementsChecker->checkYii()->check($requirements);
$getResult					= $check->getResult();
$validate					= false;


if(!empty($getResult))
{
	$checkerror				= $getResult['summary']['errors'];
	
	if(!empty($checkerror))
	{
		if($checkerror==0 || $getResult['requirements'][0]['error']=='' )
		{
			$validate		= true;
		
			
			require_once($vendorDir.'/autoload.php');
			require_once($vendorDir.'/yiisoft/yii2/Yii.php');
			$config			= require_once(__DIR__ .'/protected/config/main.php');
			
			(new yii\web\Application($config))->run();
		}
	}


}

if(!$validate)
{
	$check->render();
}

?>