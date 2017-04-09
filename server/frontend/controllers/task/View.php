<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$task = TaskRecord::findOne($id);
		
		if (is_null($task)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$ownerId = CustomerRecord::findOne(
			ProjectRecord::findOne(
				IssueRecord::findOne($task->issue_id)->project_id
			)->customer_id
		)->user_id;

		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return $task;
	}
}
