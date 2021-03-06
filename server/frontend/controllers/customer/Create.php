<?php

namespace frontend\controllers\customer;

use frontend\application\CustomerService;

use frontend\components\RestAction;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        return self::getCustomerService()->register(Yii::$app->request->post());
    }
}
