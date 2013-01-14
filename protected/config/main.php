<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Maxtron',
	'sourceLanguage'=>'zh_cn',
	'timeZone' => 'Asia/Shanghai',	
	//'layout'=>'old',
	'theme'=>'dev',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		//前插树遍历,无限分类
		'application.extensions.nestedset.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'sa',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
	// application components
	'components'=>array(
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to set up database
		/*
		'db'=>array(
			'connectionString'=>'Your DSN',
		),
		*/
		'db'=>array(
			'class'=>'CDbConnection',
			//'connectionString'=>'sqlite:'.dirname(__FILE__).'/../data/cms.db',
			// uncomment the following to use MySQL as database
			//'class'=>'application.extensions.PHPPDO.CPdoDbConnection',
      		//'pdoClass' => 'PHPPDO',
			'connectionString'=>'mysql:host=localhost;dbname=maxtron',
			'username'=>'root',
			'password'=>'su',
			'charset'=>'utf8',
			'schemaCachingDuration'=>0,
			'enableParamLogging'=>true,
			'tablePrefix' => 'maxtron_',
		),
        'cache'=>array(
            'class'=>'system.caching.CFileCache',
			'directoryLevel'=>'2',
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>true,
            'rules'=>array(
                //'<controller:\w+>'=>'<controller>/list',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<id:\d+>/<title>'=>'<controller>/view',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/cate_id/<cate_id:\d+>'=>'<controller>/list',
            ),
        ),
        'mailer' => array(
            'class' => 'ext.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),

);
