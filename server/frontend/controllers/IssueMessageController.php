<?php

namespace frontend\controllers;

use frontend\components\RestController;

class IssueMessageController extends RestController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\issue_message\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\issue_message\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\issue_message\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\issue_message\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\issue_message\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\issue_message\Options',
            ],
        ];
    }
}
