<?php

namespace backend\modules\integration\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * Данные интеграции с ресурсами
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
