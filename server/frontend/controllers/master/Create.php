<?php

namespace frontend\controllers\master;

use frontend\components\RestAction;
use frontend\services\MasterService;
use Yii;


class Create extends RestAction
{
    
    public function run()
    {
        return MasterService::create();
    }
}
