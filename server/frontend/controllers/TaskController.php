<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class TaskController extends RestController
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
                'class' => 'frontend\controllers\task\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\task\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\task\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\task\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\task\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\task\Options',
            ],
        ];
    }
}
