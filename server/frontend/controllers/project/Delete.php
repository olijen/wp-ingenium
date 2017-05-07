<?php

namespace frontend\controllers\project;

use frontend\application\ProjectService;
use frontend\components\RestAction;
use Yii;

class Delete extends RestAction
{
    public function run($id)
    {
        self::getProjectService()->deleteById($id);
    }
}
