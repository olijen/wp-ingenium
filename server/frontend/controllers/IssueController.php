<?php

namespace frontend\controllers;

use frontend\components\RestController;

class IssueController extends RestController
{
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
