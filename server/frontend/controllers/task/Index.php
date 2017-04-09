<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Index extends RestAction
{
	public function run($issue_id)
	{
		$issue = IssueRecord::findOne($issue_id);

		if (is_null($issue)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		$ownerId = CustomerRecord::findOne(
			ProjectRecord::findOne(
				$issue->project_id
			)->customer_id
		)->user_id;

		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return TaskRecord::find()->where([
				'issue_id' => $issue_id
		])->all();
	}
}
