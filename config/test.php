<?php
$params = require(__DIR__ . '/params.php');
$dbParams = require(__DIR__ . '/test_db.php');

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),    
    'language' => 'en-US',
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
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
        'db' => $dbParams,
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
            'enablePrettyUrl' => true,
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        // ],        
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],        
    ],
    'params' => $params,
];
