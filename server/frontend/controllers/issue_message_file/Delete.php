<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;
use Yii;

class Delete extends RestAction
{
    public function run($id)
    {
        $issueMessageFile = IssueMessageFileRecord::findOne($id);
        
        if (is_null($issueMessageFile)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }

        $user = $issueMessageFile->issueMessage->user;
        
        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        if (false === $issueMessageFile->delete()) {
            throw new Exception('Detetion of Issue Message File was unsuccessfull');
            return false;
        }
        
        return true;
    }
}
