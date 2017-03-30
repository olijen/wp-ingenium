<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$projectMessage = new ProjectMessageRecord;
		$projectMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$projectMessage->save() && $projectMessage->hasErrors()) {
			return $projectMessage;
		} elseif (!$projectMessage->id) {
			throw new Exception('Creation of Project Message was aborted by unknown reason');
		}
		
		return $projectMessage;
	}
}
