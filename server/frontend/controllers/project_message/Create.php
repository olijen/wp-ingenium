<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;
use common\models\ProjectRecord;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        $projectMessage = new ProjectMessageRecord;
        $projectMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
        $projectMessage->user_id = $this->getUserId();

        $project = ProjectRecord::findOne($projectMessage->project_id);
        $user = $project->customer->user;

        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        if (!$projectMessage->save() && $projectMessage->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        } elseif (!$projectMessage->id) {
            throw new Exception('Creation of Project Message was aborted by unknown reason');
        }
        
        return $projectMessage;
    }
}
