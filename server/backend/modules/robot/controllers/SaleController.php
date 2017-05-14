<?php

namespace backend\modules\robot\controllers;

use yii\web\Controller;

class SaleController extends Controller
{
    public $saleService;

    public function actionIndex()
    {
        
        return $this->render('index');
    }
}
