<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class TokenController extends RestController
{
	public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => array_keys($this->actions()),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => array_keys($this->actions()),
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }

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
                'class' => 'frontend\controllers\token\Options',
            ],
        ];
    }
}
