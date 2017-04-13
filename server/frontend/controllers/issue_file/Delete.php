<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use Yii;

class Delete extends RestAction
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

		if (false === $issueFile->delete()) {
			throw new Exception('Failed to delete the Issue File for unknown reason.');
		}
		return true;
	}
}
