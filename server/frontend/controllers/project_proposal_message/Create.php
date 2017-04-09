<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$projectProposalMessage = new ProjectProposalMessageRecord;
		$projectProposalMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());

		$ownerId = CustomerRecord::findOne(
			ProjectRecord::findOne(
				$projectProposalMessage->project_id
			)->customer_id
		)->user_id;

		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		$projectProposalMessage->created_date = $projectProposalMessage->updated_date = time();
		
		if (!$projectProposalMessage->save() && $projectProposalMessage->hasErrors()) {
			return $projectProposalMessage;
		} elseif (!$projectProposalMessage->id) {
			throw new Exception('Creation of Project Proposal Message was aborted by unknown reason');
		}
		
		return $projectProposalMessage;
	}
}
