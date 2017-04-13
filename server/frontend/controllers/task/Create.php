<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$task = new TaskRecord;
		$task->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		$user = $task->issue->project->customer->user;

		if ($user->id !== $this->getUserId()) {
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
