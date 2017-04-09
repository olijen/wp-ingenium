<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$task = new TaskRecord;
		$task->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		$ownerId = CustomerRecord::findOne(
			ProjectRecord::findOne(
				IssueRecord::findOne($task->issue_id)->project_id
			)->customer_id
		)->user_id;

		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		if (!$task->save() && $task->hasErrors()) {
			return $task;
		} elseif (!$task->id) {
			throw new Exception('Creation of Task was aborted by unknown reason');
		}
		
		return $task;
	}
}
