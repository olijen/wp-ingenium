<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$projectMessage = ProjectMessageRecord::findOne($id);
		
		if (is_null($projectMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		if ($projectMessage->user_id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		return $projectMessage;
	}
}
