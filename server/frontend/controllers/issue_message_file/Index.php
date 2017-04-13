<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class Index extends RestAction
{
    public function run($issue_message_id)
    {
        $issueMessage = IssueMessageRecord::findOne($issue_message_id);
        
        if (is_null($issueMessage)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }
        
        $user = $issueMessage->user;

        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }

        return $issueMessage->issueMessageFiles;
    }
}
