<?php

namespace frontend\controllers;

use frontend\components\RestController;

class ProjectController extends RestController
{
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
