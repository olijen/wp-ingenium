<?php

namespace frontend\controllers\customer;

use frontend\application\CustomerService;

use frontend\components\RestAction;
use Yii;

class Security extends RestAction
{
    public function run()
    {
        //todo: check in controller
        if (!Yii::$app->user->isGuest) {
            return 'user is logged in';
        }
        $token = self::getCustomerService()->login(Yii::$app->request->post());
        if (!$token) {
            //todo
            return 'token empty';
        }
        return $token;
    }
}
