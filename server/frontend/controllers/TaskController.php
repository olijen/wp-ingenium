<?php

namespace frontend\controllers;

use frontend\components\RestController;

class TaskController extends RestController
{
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
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
