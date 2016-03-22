<?php


$config = array(

      'id'                  => 'exam',
      'basePath'            => __DIR__ .DIRECTORY_SEPARATOR.'..',
      'bootstrap'           => array('log'),
      'name'                => 'Exam',
      'timezone'            => 'Asia/Manila',
      'defaultRoute'        => 'backend/index',
       // 'modules'         => array(
      //                       'gii' => 'yii\gii\Module',
      //                     ),
      'components'       => array(
                            'request' 		=> array(
													// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
													'cookieValidationKey' => 'exam',
											),
                            'cache'        	=> array(
                                                    'class' => 'yii\caching\FileCache',
                                              ),
							'user' 		  	=> array (
													'identityClass'		 	=> 'yii\web\User',
													'enableAutoLogin' 		=> true,
													'loginUrl' 				=> array('admin/login'), 
											),
                            'urlManager'  => array(
													// 'class'			  =>'yii\web\UrlManager',
													'enablePrettyUrl' => true,
                                                    'showScriptName'  => false,
                                                    'rules'           => require_once(__DIR__ .'/routes.php'),
                                            ),
                           'db'           => array(
                                                    'class'     => 'yii\db\Connection',
                                                    'dsn'       => 'mysql:host=localhost;dbname=exam',
                                                    'username'  => 'root',
                                                    'password'  => '',
                                                    'charset'   => 'utf8',
                                            ),
                            'mailer'      => array(
                                                    'class'             => 'yii\swiftmailer\Mailer',
													                          'viewPath'			    => '@app/views/mail',
                                                    // send all mails to a file by default. You have to set
                                                    // 'useFileTransport' to false and configure a transport
                                                    // for the mailer to send real emails.
                          													'useFileTransport'	=> false,
                                                    // 'transport'			    => array(
                                        												// 							'class' => 'Swift_SmtpTransport',
                                        												// 							'host' => 'smtp.gmail.com',
                                        												// 							'username' => 'rommelpaa@gmail.com',
                                        												// 							'password' => 'R1989P@0413..',
                                        												// 							'port' => '587',
                                        												// 							'encryption' => 'tls',
                                        												// 						),
                                              ), 
                            'errorHandler' => array(
                                      'errorAction' => 'error/index',
                                    ),
                            'log' => array(
                                        'traceLevel'  => YII_DEBUG ? 3 : 0,
                                        'targets'     => array(
                                                            array(
                                                                'class'  => 'yii\log\FileTarget',
                                                                'levels' => array('error', 'warning'),
                                                            ),
                                                       ),
                                    ),
                          ),
      'params'          => array(

                            'adminEmail'   => 'rommelpaa@gmail.com',
                          ),

    );


return $config;