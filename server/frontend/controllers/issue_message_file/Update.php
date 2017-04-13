<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;
use Yii;

class Update extends RestAction
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
		
		$issueMessage = $issueMessageFile->issueMessage;
		
		$issueMessageFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if ($issueMessageFile->issue_message_id !== $issueMessage->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$issueMessageFile->save() && $issueMessageFile->hasErrors()) {
			return $issueMessageFile;
		}
		
		return $issueMessageFile;
	}
}
