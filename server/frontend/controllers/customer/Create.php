<?php

namespace frontend\controllers\customer;

use frontend\application\CustomerService;

use frontend\components\RestAction;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        (new CustomerService())->register(Yii::$app->request->post());
    }
}
