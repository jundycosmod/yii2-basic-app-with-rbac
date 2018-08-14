<?php
$params = require __DIR__ . '/params.php';
$dbParams = require __DIR__ . '/test_db.php';

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'language' => 'en-US',
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
