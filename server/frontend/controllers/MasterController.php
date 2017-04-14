<?php

namespace frontend\controllers;

use frontend\components\RestController;

class MasterController extends RestController
{
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
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
