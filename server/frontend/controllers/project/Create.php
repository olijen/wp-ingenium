<?php

namespace frontend\controllers\project;

use frontend\application\ProjectService;
use frontend\components\RestAction;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        return (new ProjectService)->create(Yii::$app->request->post());
    }
}
