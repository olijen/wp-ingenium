<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$projectMessage = ProjectMessageRecord::findOne($id);
		
		if (is_null($projectMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$projectMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$projectMessage->save();
		
		return $projectMessage;
	}
}
