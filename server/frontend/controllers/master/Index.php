<?php

namespace frontend\controllers\user;

use frontend\components\RestAction;
use frontend\services\MasterService;

class Index extends RestAction
{
    function run()
    {
        return MasterService::getAllMasters();
    }
}