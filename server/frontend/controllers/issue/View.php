<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use Yii;

class View extends RestAction
{
    public function run($id)
    {
        $issue = IssueRecord::findOne($id);
        
        if (is_null($issue)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }
        
        $user = $issue->project->customer->user;
        
        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }

        return $issue;
    }
}
