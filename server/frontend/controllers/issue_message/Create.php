<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use common\models\IssueRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$issueMessage = new IssueMessageRecord;

		$issueMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$issueMessage->user_id = $this->getUserId();
		
		$issue = IssueRecord::findOne($issueMessage->issue_id);
		$user = $issue->project->customer->user;
		
		if ($user->id !== $issueMessage->user_id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$issueMessage->save() && $issueMessage->hasErrors()) {
			return $issueMessage;
		} elseif (!$issueMessage->id) {
			throw new Exception('Creation of Issue Message was aborted by unknown reason');
		}
		
		return $issueMessage;
	}
}
