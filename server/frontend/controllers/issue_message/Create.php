<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use common\models\ProjectRecord;
use common\models\IssueRecord;
use common\models\CustomerRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$issueMessage = new IssueMessageRecord;

		$issueMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$issueMessage->user_id = Yii::$app->user->identity->id;

		$customer = CustomerRecord::findOne(
			ProjectRecord::findOne(
				IssueRecord::findOne(
					$issueMessage->issue_id
				)->project_id
			)->customer_id
		);

		if ($issueMessage->user_id !== $customer->user_id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		$issueMessage->created_date = $issueMessage->updated_date = time();
		
		if (!$issueMessage->save() && $issueMessage->hasErrors()) {
			return $issueMessage;
		} elseif (!$issueMessage->id) {
			throw new Exception('Creation of Issue Message was aborted by unknown reason');
		}
		
		return $issueMessage;
	}
}
