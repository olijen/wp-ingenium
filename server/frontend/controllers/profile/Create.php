<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        $profile = new ProfileRecord;
        
        $profile->setAttributes(Yii::$app->getRequest()->getBodyParams());
        $profile->user_id = $this->getUserId();
        
        if (!$profile->save() && $profile->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        }
        
        return $profile;
    }
}
