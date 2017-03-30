<?php

namespace frontend\controllers;

use frontend\components\RestController;

class ProjectMessageController extends RestController
{
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
