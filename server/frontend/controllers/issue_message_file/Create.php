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
		
		$ownerId = IssueMessageRecord::findOne($issueMessageFile->issue_message_id)->user_id;
		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		if (!$issueMessageFile->save() && $issueMessageFile->hasErrors()) {
			return $issueMessageFile;
		} elseif (!$issueMessageFile->id) {
			throw new Exception('Creation of Issue Message File was aborted by unknown reason');
		}
		
		return $issueMessageFile;
	}
}
