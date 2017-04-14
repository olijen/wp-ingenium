<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;
use common\models\IssueMessageRecord;
use Yii;

class Create extends RestAction
{
    public function run()
    {
        $issueMessageFile = new IssueMessageFileRecord;
        $issueMessageFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
        
        $issueMessage = IssueMessageRecord::findOne($issueMessageFile->issue_message_id);
        $user = $issueMessage->user;
        
        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        if (!$issueMessageFile->save() && $issueMessageFile->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        } elseif (!$issueMessageFile->id) {
            throw new Exception('Creation of Issue Message File was aborted by unknown reason');
        }
        
        return $issueMessageFile;
    }
}
