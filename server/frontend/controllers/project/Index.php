<?php

namespace frontend\controllers\project;

use frontend\application\ProjectService;

use frontend\components\RestAction;
use Yii;

class Index extends RestAction
{
    public function run()
    {
        return self::getProjectService()->getAll();
    }
}
