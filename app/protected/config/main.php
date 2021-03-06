<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once('params.php');
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'JiaLink',

    // preloading 'log' component
    'preload'=>array(
        'log',
        'bootstrap',
    ),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.models.form.*',
        'application.components.*',
        'application.extensions.yii-mail.*',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool
        
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'password',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('*'),
        ),
    ),
    'behaviors' => array(
        'onBeginRequest' => array(
            'class' => 'application.components.RequiredLogin'
        )
    ),
    // application components
    'components'=>array(
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'mailtrap.io',
                'username' => 'jialink-7448a9bd0c1df74a',
                'password' => 'a83d956f070ae15a',
                'port' => '2525',
                //'encryption'=>'tls',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        // uncomment the following to enable URLs in path-format
        
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'urlSuffix'=>'',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        
        'db'=>array(
            'class'=>'CDbConnection',
            'connectionString'=>$params['db']['connectionString'],
            'username'=>$params['db']['username'],
            'password'=>$params['db']['password'],
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'xueyuan@imajery.com',
    ),
);