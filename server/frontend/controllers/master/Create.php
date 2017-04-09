<?php

namespace frontend\controllers\master;

use frontend\components\RestAction;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        Yii::$app->getResponse()->setStatusCode(403);
		return;
    }
}
