<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class IssueMessageFileController extends RestController
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
                'class' => 'frontend\controllers\issue_message_file\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\issue_message_file\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\issue_message_file\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\issue_message_file\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\issue_message_file\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\issue_message_file\Options',
            ],
        ];
    }
}
