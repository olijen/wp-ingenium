<?php

namespace frontend\controllers\token;

use frontend\components\RestAction;
use common\models\TokenRecord;
use Yii;

class View extends RestAction
{
    public function run($id)
    {
        $token = TokenRecord::findOne($id);
        
        if (is_null($token)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }
        
        return $token;
    }
}
