<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$projectProposalMessage = ProjectProposalMessageRecord::findOne($id);

		if (is_null($projectProposalMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		$ownerId = CustomerRecord::findOne(
			ProjectRecord::findOne(
				$projectProposalMessage->project_id
			)->customer_id
		)->user_id;

		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		return $projectProposalMessage;
	}
}
