<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use Yii;

class Create extends RestAction
{ 
    public function run()
    {
        $issue = new IssueRecord;
        $issue->setAttributes(Yii::$app->getRequest()->getBodyParams());
        
        $user = $issue->project->customer->user;
        
        if ($user->id !== $this->getUserId()) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }
        
        if (!$issue->save() && $issue->hasErrors()) {
            Yii::$app->getResponse()->setStatusCode(400);
        } elseif (!$issue->id) {
            throw new Exception('Creation of Issue was aborted by unknown reason');
        }
        
        return $issue;
    }
}
