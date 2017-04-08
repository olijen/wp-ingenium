<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class IssueController extends RestController
{
	// public function behaviors()
 //    {
 //        $behaviors = parent::behaviors();

 //        $behaviors['access'] = [
 //            'class' => AccessControl::className(),
 //            'only' => array_keys($this->actions()),
 //            'rules' => [
 //                [
 //                    'allow' => true,
 //                    'actions' => array_keys($this->actions()),
 //                    'roles' => ['@'],
 //                ],
 //            ],
 //        ];

 //        return $behaviors;
 //    }
	
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\issue\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\issue\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\issue\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\issue\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\issue\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\issue\Options',
            ],
        ];
    }
}
