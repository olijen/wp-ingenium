<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use Yii;

class Update extends RestAction
{
    public function run($id)
    {
        $task = TaskRecord::findOne($id);
        
        if (is_null($task)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }

        $user = $task->issue->project->customer->user;

        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        $issue = $task->issue;
        
        $task->setAttributes(Yii::$app->getRequest()->getBodyParams());
        
        if ($task->issue_id !== $issue->id) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        if (!$task->save() && $task->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        }
        
        return $task;
    }
}
