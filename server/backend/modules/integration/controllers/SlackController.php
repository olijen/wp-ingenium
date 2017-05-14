<?php

namespace backend\modules\integration\controllers;

use yii\web\Controller;

class SlackController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
