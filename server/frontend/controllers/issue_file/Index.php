<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueRecord;
use Yii;

class Index extends RestAction
{
    public function run($issue_id)
    {
        $issue = IssueRecord::findOne($issue_id);
        
        if (is_null($issue)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }
        
        $user = $issue->project->customer->user;
        
        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }

        return $issue->issueFiles;
    }
}
