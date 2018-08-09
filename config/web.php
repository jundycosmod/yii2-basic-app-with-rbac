<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic',
    'name' => 'Yii2 RBAC by jundycosmod',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
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
            'admins' => ['admin', 'fideljundyc'],
            'controllerMap' => [
                //'admin' => 'app\modules\user\controllers\DefaultController'
                'security' => [
                    'class' => 'dektrium\user\controllers\SecurityController',
                    'layout' => '@app/views/layouts/modal',
                ],
            ],
            //'admins' => ['admin', 'jcagentzero'],
        ],
        'branch' => [
            'class' => 'app\modules\branch\BranchModule',
        ],
        'location' => [
            'class' => 'app\modules\location\LocationModule',
        ],
        'terminal' => [
            'class' => 'app\modules\terminal\TerminalModule',
        ],
        'discount' => [
            'class' => 'app\modules\discount\DiscountModule',
        ],
        'category' => [
            'class' => 'app\modules\category\CategoryModule',
        ],
        'subcategory' => [
            'class' => 'app\modules\subcategory\SubcategoryModule',
        ],
        'supplier' => [
            'class' => 'app\modules\supplier\SupplierModule',
        ],
        'uom' => [
            'class' => 'app\modules\uom\UomModule',
        ],
        'items' => [
            'class' => 'app\modules\items\ItemsModule',
        ],
        'customertype' => [
            'class' => 'app\modules\customertype\CustomertypeModule',
        ],
        'profession' => [
            'class' => 'app\modules\profession\ProfessionModule',
        ],
        'customer' => [
            'class' => 'app\modules\customer\CustomerModule',
        ],
        'customerdelivery' => [
            'class' => 'app\modules\customerdelivery\CustomerdeliveryModule',
        ],
        'profile' => [
            'class' => 'app\modules\profile\ProfileModule',
        ],
        'pos' => [
            'class' => 'app\modules\pos\PosModule',
        ],
        'paymentmode' => [
            'class' => 'app\modules\paymentmode\PaymentmodeModule',
        ],
        'dashboard' => [
            'class' => 'app\modules\dashboard\DashboardModule',
        ],
        'expensestype' => [
            'class' => 'app\modules\expensestype\ExpensestypeModule',
        ],
        'expenses' => [
            'class' => 'app\modules\expenses\ExpensesModule',
        ],
        'deliveryschedule' => [
            'class' => 'app\modules\deliveryschedule\DeliveryScheduleModule',
        ],
        'inventory' => [
            'class' => 'app\modules\inventory\InventoryModule',
        ],
        'physicalcount' => [
            'class' => 'app\modules\physicalcount\PhysicalcountModule',
        ],
        'receiving' => [
            'class' => 'app\modules\receiving\ReceivingModule',
        ],
        'returns' => [
            'class' => 'app\modules\returns\ReturnsModule',
        ],
        'adjustments' => [
            'class' => 'app\modules\adjustments\AdjustmentsModule',
        ],
        'settings' => [
            'class' => 'app\modules\settings\SettingsModule',
        ],
        'rights' => [
            'class' => 'app\modules\rights\RightsModule',
        ],
        'delivery' => [
            'class' => 'app\modules\delivery\DeliveryModule',
        ],
        'audittrail' => [
            'class' => 'app\modules\audittrail\AuditTrailModule',
        ],
        'reports' => [
            'class' => 'app\modules\reports\ReportsModule',
        ],
        'access' => [
            'class' => 'app\modules\access\AccessModule',
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
        'googleApi' =>
        [
            'class' => '\skeeks\yii2\googleApi\GoogleApiComponent',
            'developer_key' => '***REMOVED***',
        ],
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'Php',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'jundycosmod@gmail.com',
                'password' => 'mojoylmibmuuhbwb',
                'port' => '587',
                'encryption' => 'tls',
            ],
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
