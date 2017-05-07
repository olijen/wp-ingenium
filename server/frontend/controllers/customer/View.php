<?php

namespace frontend\controllers\customer;

use frontend\components\RestAction;
use Yii;

class View extends RestAction
{
    public function run()
    {
        return self::getCustomerService()->getById(userId());
    }
}
