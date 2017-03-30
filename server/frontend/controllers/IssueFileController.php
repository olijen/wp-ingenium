<?php

namespace frontend\controllers;

use frontend\components\RestController;

class IssueFileController extends RestController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\issue_file\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\issue_file\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\issue_file\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\issue_file\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\issue_file\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\issue_file\Options',
            ],
        ];
    }
}
