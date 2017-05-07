<?php

return [
    'enablePrettyUrl' => true,
    //'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],

        ['class' => 'yii\rest\UrlRule', 'controller' => 'master'],

        ['class' => 'yii\rest\UrlRule', 'controller' => 'issue'],
        'GET,HEAD projects/<project_id>/issues' => 'issue/index',
        'POST projects/<project_id>/issues' => 'issue/create',
        'OPTIONS projects/<project_id>/issues' => 'issue/options',

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

        'OPTIONS security' => 'customer/options',
        'security' => 'customer/security'
    ],
];

/* [
    'PUT,PATCH users/<id>' => 'user/update',
    'DELETE users/<id>' => 'user/delete',
    'GET,HEAD users/<id>' => 'user/view',
    'POST users' => 'user/create',
    'GET,HEAD users' => 'user/index',
    'users/<id>' => 'user/options',
    'users' => 'user/options',
] */
