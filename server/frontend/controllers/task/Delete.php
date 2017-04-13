<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use Yii;

class Delete extends RestAction
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

        if (false === $task->delete()) {
            throw new Exception('Detetion of Task was unsuccessfull');
            return false;
        }
        
        return true;
    }
}
