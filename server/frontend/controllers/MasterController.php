<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class MasterController extends RestController
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
                'class' => 'frontend\controllers\master\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\master\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\master\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\master\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\master\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\master\Options',
            ],
        ];
    }
}