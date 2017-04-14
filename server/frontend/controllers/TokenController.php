<?php

namespace frontend\controllers;

use frontend\components\RestController;

class TokenController extends RestController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\token\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\token\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\token\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\token\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\token\Delete',
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
