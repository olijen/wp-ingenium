<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use Yii;

class Delete extends RestAction
{
	public function run($id)
	{
		$projectProposalMessage = ProjectProposalMessageRecord::findOne($id);
		
		if (is_null($projectProposalMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		if (false === $projectProposalMessage->delete()) {
			throw new Exception('Detetion of Project Proposal Message was unsuccessfull');
			return false;
		}
		
		return true;
	}
}
