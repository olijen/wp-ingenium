<?php

namespace frontend\controllers\customer;

use frontend\application\CustomerService;

use frontend\components\RestAction;
use Yii;

class View extends RestAction
{
    public function run()
    {
        return (new CustomerService())->getById($this->getUserId());
    }
}
