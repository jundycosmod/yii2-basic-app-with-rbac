<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'yii2-rbac',
    'name' => 'Yii2 RBAC',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation' => false,
            'enableRegistration' => false,
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin', 'admin'],
            'controllerMap' => [
                //'admin' => 'app\modules\user\controllers\DefaultController'
                'security' => [
                    'class' => 'dektrium\user\controllers\SecurityController',
                    'layout' => '@app/views/layouts/modal',
                ],
            ],
        ],

        'profile' => [
            'class' => 'app\modules\profile\ProfileModule',
        ],
        'settings' => [
            'class' => 'app\modules\settings\SettingsModule',
        ],
        'rights' => [
            'class' => 'app\modules\rights\RightsModule',
        ],
        'access' => [
            'class' => 'app\modules\access\AccessModule',
        ],
        'audittrail' => [
            'class' => 'app\modules\audittrail\AuditTrailModule',
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                ],
            ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'skill',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => require __DIR__ . '/db.php',
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
    'timeZone' => 'Asia/Manila',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
//            $config['modules']['gii'] = [
    //                'class' => 'yii\gii\Module',
    //            ];
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => ['ximplecrud' => '@app/templates/gii/generators/crud/default'],
            ],
            'module' => [
                'class' => 'yii\gii\generators\module\Generator',
                'templates' => ['ximplemodule' => '@app/templates/gii/generators/module/default'],
            ],
            'model' => [
                'class' => 'yii\gii\generators\model\Generator',
                'templates' => ['ximplemodule' => '@app/templates/gii/generators/model/default'],
            ],
        ],
    ];
}

return $config;
