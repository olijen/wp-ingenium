<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        $project = new ProjectRecord;
        $project->setAttributes(Yii::$app->getRequest()->getBodyParams());
        
        $customer = CustomerRecord::findOne(['user_id' => $this->getUserId()]);
        $project->customer_id = $customer->id;
        
        if (!$project->save() && $project->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        } elseif (!$project->id) {
            throw new Exception('Creation of Project was aborted by unknown reason');
        }
        
        return $project;
    }
}
