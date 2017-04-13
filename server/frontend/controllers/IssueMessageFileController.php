<?php

namespace frontend\controllers;

use frontend\components\RestController;

class IssueMessageFileController extends RestController
{
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
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
