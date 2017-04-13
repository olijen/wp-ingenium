<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use Yii;

class Update extends RestAction
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
		
		$issue = $issueFile->issue;
		
		$issueFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if ($issueFile->issue_id !== $issue->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$issueFile->save() && $issueFile->hasErrors()) {
			return $issueFile;
		}
		
		return $issueFile;
	}
}
