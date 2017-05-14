<?php

namespace frontend\controllers;

use frontend\components\RestController;

class CustomerController extends RestController
{
    protected function authenticatorBehavior()
    {
        return [
            'class' => 'yii\filters\auth\HttpBearerAuth',
            'only' => ['index', 'view', /*'create',*/ 'update', 'delete'],
        ];
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\customer\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\customer\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\customer\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\customer\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\customer\Delete',
            ],
            'security' => [
                'class' => 'frontend\controllers\customer\Security',
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
