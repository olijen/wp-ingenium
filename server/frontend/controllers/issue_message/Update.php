<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$issueMessage = IssueMessageRecord::findOne($id);
		
		if (is_null($issueMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$issueMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$issueMessage->save();
		
		return $issueMessage;
	}
}
