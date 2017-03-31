<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use Yii;

class Delete extends RestAction
{
    public function run($id)
    {
		$issue = IssueRecord::findOne($id);
		
		if (is_null($issue)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		if (false === $issue->delete()) {
			throw new Exception('Failed to delete the Issue for unknown reason.');
			return false;
		}
		return true;
	}
}
