<?php

namespace frontend\controllers;

use frontend\components\RestController;

class ProfileController extends RestController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\profile\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\profile\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\profile\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\profile\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\profile\Delete',
            ],
            'options' => [
                'class' => 'frontend\controllers\profile\Options',
            ],
        ];
    }
}
