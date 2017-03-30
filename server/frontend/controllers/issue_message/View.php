<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$issueMessage = IssueMessageRecord::findOne($id);
		
		if (is_null($issueMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		return $issueMessage;
	}
}
