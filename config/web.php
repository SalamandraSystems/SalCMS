<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout'=>'blog',
    'language'=>'ru',
    'modules' => [
        'blog' => [
            'class' => 'app\modules\blog\BlogModule',
        ],
        'admin' => [
            'class' => 'cms\admin\Module',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'images/store', //path to origin images
            'imagesCachePath' => 'images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'FxCwssOKybRJ95XA1V_Je-LxKvJVWvZm',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'cms\admin\models\User',
            'enableAutoLogin' => true,
            //'loginUrl' => ['admin/user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'signup'=>'site/signup',
                'login'=>'site/login',
                '<username>' => 'blog/main/index',
                '<username>/<action:(edit)>' => 'blog/main/<action>',
                '<username>/<post>' => 'blog/main/index',

            ],
        ],
        'assetManager'=>[
            'forceCopy'=>true
        ],
        'i18n' => [
            'translations' => [
                'cms*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@cms/messages',
                    'sourceLanguage' => 'ru-Ru',
                    'fileMap' => [
                        'cms'       => 'cms.php',
                        'cms/error' => 'error.php',
                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
    'aliases' => [
        '@cms' => '@app/cms'
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'blog/*',
            'site/*',
            '/*',

        ]
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
