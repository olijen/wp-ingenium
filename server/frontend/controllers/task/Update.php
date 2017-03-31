<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$task = TaskRecord::findOne($id);
		
		if (is_null($task)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$task->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$task->save();
		
		return $task;
	}
}
