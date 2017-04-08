<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
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

		$project = ProjectRecord::findOne(['id' => $issue->project_id]);
		$customer = CustomerRecord::findOne(['user_id' => Yii::$app->user->identity->id]);

		if ($project->customer_id !== $customer->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (false === $issue->delete()) {
			throw new Exception('Failed to delete the Issue for unknown reason.');
			return false;
		}
		return true;
	}
}
