<?php

namespace frontend\controllers\project;

use frontend\application\ProjectService;
use frontend\components\RestAction;

use Yii;

class View extends RestAction
{
    public function run($id)
    {
        return (new ProjectService)->getById($id);
    }
}
