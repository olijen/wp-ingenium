<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use common\models\IssueRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$issueFile = new IssueFileRecord;
		$issueFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		$issue = IssueRecord::findOne($issueFile->issue_id);
		$user = $issue->project->customer->user;
		
		if ($user->id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$issueFile->save() && $issueFile->hasErrors()) {
			return $issueFile;
		} elseif (!$issueFile->id) {
			throw new Exception('Creation of Issue File is aborting for unknown reason');
		}
		
		return $issueFile;
	}
}
