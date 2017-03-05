<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

class UserController extends Controller
{
    public $modelClass = 'common\models\User';

    function actionIndex()
    {
        exit('qweqwe');
    }
}