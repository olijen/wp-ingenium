<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$issueMessage = new IssueMessageRecord;
		$issueMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$issueMessage->save() && $issueMessage->hasErrors()) {
			return $issueMessage;
		} elseif (!$issueMessage->id) {
			throw new Exception('Creation of Issue Message was aborted by unknown reason');
		}
		
		return $issueMessage;
	}
}
