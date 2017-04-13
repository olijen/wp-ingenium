<?php

namespace frontend\controllers\token;

use frontend\components\RestAction;
use common\models\TokenRecord;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        $token = new TokenRecord;
        
        $token->setAttributes(Yii::$app->getRequest()->getBodyParams());
        $token->save();
        
        return $token;
    }
}
