<?php

namespace frontend\components;

use yii\rest\Controller;

class RestController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'authenticator' => $this->authenticatorBehavior(),
            'access' => $this->accessBehavior(),

            'cors' => [
                'class' => 'yii\filters\Cors',
            ],
        ]);
    }

    public function init()
    {
        parent::init();
    }

    public function checkAccess($action, $model = null, $params = [])
    {

    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
            'login' => ['POST'],
        ];
    }

    protected function authenticatorBehavior()
    {
        return [
            'class' => 'yii\filters\auth\HttpBearerAuth',
            'only' => ['index', 'view', 'create', 'update', 'delete'],
        ];
    }

    protected function accessBehavior()
    {
        return [
            'class' => '\yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['index', 'view', 'create', 'update', 'delete'],
                    'roles' => ['@'],
                ],
            ],
        ];
    }
}
