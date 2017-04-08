<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$projectMessage = new ProjectMessageRecord;
		$projectMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$projectMessage->user_id = Yii::$app->user->identity->id;

		$ownerId = CustomerRecord::findOne(
			ProjectRecord::findOne(
				$projectMessage->project_id
			)->customer_id
		)->user_id;

		if ($ownerId !== $projectMessage->user_id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		$projectMessage->created_date = $projectMessage->updated_date = time();
		
		if (!$projectMessage->save() && $projectMessage->hasErrors()) {
			return $projectMessage;
		} elseif (!$projectMessage->id) {
			throw new Exception('Creation of Project Message was aborted by unknown reason');
		}
		
		return $projectMessage;
	}
}
