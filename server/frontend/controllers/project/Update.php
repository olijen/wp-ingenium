<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Update extends RestAction
{
    public function run($id)
    {
        $project = ProjectRecord::findOne($id);
        
        if (is_null($project)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }
        
        $customer = CustomerRecord::findOne(['user_id' => $this->getUserId()]);
        
        if ($project->customer_id !== $customer->id) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }

        $project->setAttributes(Yii::$app->getRequest()->getBodyParams());
        
        if (!$project->save() && $project->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        }
        
        return $project;
    }
}
