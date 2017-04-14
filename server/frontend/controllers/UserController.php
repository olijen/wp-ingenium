<?php

namespace frontend\controllers;

use frontend\components\RestController;

class UserController extends RestController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\user\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\user\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\user\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\user\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\user\Delete',
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
