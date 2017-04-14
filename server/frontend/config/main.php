<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'authClientCollection' => [
            //todo: защитить от взлома (искать в статье?)
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '1080419497812-s3i401r1c7tit5nm2ifh8henbibmtd54.apps.googleusercontent.com',
                    'clientSecret' => 'qRGvspMMuASo1txemEqiLFc1',
                ],
                'twitter' => [
                    'class' => 'yii\authclient\clients\Twitter',
                    'consumerKey' => 'twitter_consumer_key',
                    'consumerSecret' => 'twitter_consumer_secret',
                ],
            ],
        ],
        'request' => [
            //todo: включить CSRF! Хотя, возможно в API это не нужно...
            //'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserRecord',
            'enableSession' => false,
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ], [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@app/runtime/logs/eauth.log',
                    'categories' => ['nodge\eauth\*'],
                    'logVars' => [],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'master'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'issue'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'customer'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'issue-file'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'issue-message'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'issue-message-file'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'profile'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'project'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'project-message'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'project-proposal-message'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'task'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'token'],
                'login/<service:google|facebook|etc>' => 'site/login'
            ],
        ],
    ],
    'params' => $params,
];

return $config;
