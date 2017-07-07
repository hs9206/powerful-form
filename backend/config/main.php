<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'homeUrl' => '/admin',
    'basePath' => dirname(__DIR__),
   
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //'modules' => [],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/uploads',
            'uploadUrl' => '@web/uploads',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],

        'filemanager' => [
        'class' => 'pendalf89\filemanager\Module',
        // Upload routes
        'routes' => [
            // Base absolute path to web directory
            'baseUrl' => '',
            // Base web directory url
            'basePath' => '@frontend/web',
            // Path for uploaded files in web directory
            'uploadPath' => 'uploads',
        ],
        // Thumbnails info
        'thumbs' => [
            'small' => [
                'name' => 'Мелкий',
                'size' => [100, 100],
            ],
            'medium' => [
                'name' => 'Средний',
                'size' => [300, 200],
            ],
            'large' => [
                'name' => 'Большой',
                'size' => [500, 400],
            ],
        ],
        ],

    ],

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            //'baseUrl' => '',
            'baseUrl' => '/admin',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            //'name' => 'advanced-backend',
            'name' => 'one-session',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'pform/view/<id:\d+>' => 'pform/view',
                'pform/update/<id:\d+>' => 'pform/update',

                'cpform/create/<pfuid:\w+>' => 'customer-pform/create',
                'cpform/statistics/<uid:\w+>' => 'customer-pform/statistics',
            ],
        ],
        
    ],
    'params' => $params,
];
