<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use Yii;

class View extends RestAction
{
    public function run($id)
    {
        $issueFile = IssueFileRecord::findOne($id);
        
        if (is_null($issueFile)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }

        $user = $issueFile->issue->project->customer->user;

        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        return $issueFile;
    }
}
