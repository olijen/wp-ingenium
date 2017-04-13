<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$issueMessage = IssueMessageRecord::findOne($id);
		
		if (is_null($issueMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		if ($issueMessage->user_id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		$issue = $issueMessage->issue;
		
		$issueMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if ($issueMessage->issue_id !== $issue->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$issueMessage->save() && $issueMessage->hasErrors()) {
			return $issueMessage;
		}
		
		return $issueMessage;
	}
}
