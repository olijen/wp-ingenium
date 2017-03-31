<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$projectProposalMessage = new ProjectProposalMessageRecord;
		$projectProposalMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$projectProposalMessage->save() && $projectProposalMessage->hasErrors()) {
			return $projectProposalMessage;
		} elseif (!$projectProposalMessage->id) {
			throw new Exception('Creation of Project Proposal Message was aborted by unknown reason');
		}
		
		return $projectProposalMessage;
	}
}
