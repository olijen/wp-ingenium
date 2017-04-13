<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class Delete extends RestAction
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
		
		if (false === $issueMessage->delete()) {
			throw new Exception('Detetion of Issue Message was unsuccessfull');
			return false;
		}
		
		return true;
	}
}
