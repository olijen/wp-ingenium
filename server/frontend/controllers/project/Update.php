<?php

namespace frontend\controllers\project;

use frontend\application\ProjectService;
use frontend\components\RestAction;

use Yii;

class Update extends RestAction
{
    public function run($id)
    {
        (new ProjectService())->updateById($id, Yii::$app->request->post());
    }
}
