<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class CustomerController extends RestController
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
				'class' => 'frontend\controllers\customer\Index',
			],
			'view' => [
				'class' => 'frontend\controllers\customer\View',
			],
			'create' => [
				'class' => 'frontend\controllers\customer\Create',
			],
			'update' => [
				'class' => 'frontend\controllers\customer\Update',
			],
			'delete' => [
				'class' => 'frontend\controllers\customer\Delete',
			],
			'options' => [
				'class' => 'frontend\controllers\customer\Options',
			],
		];
	}
}
