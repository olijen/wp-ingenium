<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class ProfileController extends RestController
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
                'class' => 'frontend\controllers\profile\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\profile\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\profile\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\profile\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\profile\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\profile\Options',
            ],
        ];
    }
}
