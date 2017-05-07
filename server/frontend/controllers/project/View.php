<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;

use Yii;

class View extends RestAction
{
    public function run($id)
    {
        return self::getProjectService()->getById($id);
    }
}
