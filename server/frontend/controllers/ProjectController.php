<?php

namespace frontend\controllers;

use frontend\components\RestController;
use yii\filters\AccessControl;

class ProjectController extends RestController
{
    // public function behaviors()
    // {
    //     $behaviors = parent::behaviors();

    //     $behaviors['access'] = [
    //         'class' => AccessControl::className(),
    //         'only' => array_keys($this->actions()),
    //         'rules' => [
    //             [
    //                 'allow' => true,
    //                 'actions' => array_keys($this->actions()),
    //                 'roles' => ['@'],
    //             ],
    //         ],
    //     ];

    //     return $behaviors;
    // }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\project\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\project\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\project\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\project\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\project\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\project\Options',
            ],
        ];
    }
}
