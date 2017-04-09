<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class ProjectMessageController extends RestController
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
                'class' => 'frontend\controllers\project_message\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\project_message\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\project_message\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\project_message\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\project_message\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\project_message\Options',
            ],
        ];
    }
}
