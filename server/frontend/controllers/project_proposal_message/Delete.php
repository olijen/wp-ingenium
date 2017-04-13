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

		$user = $projectProposalMessage->project->customer->user;

		if ($user->id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (false === $projectProposalMessage->delete()) {
			throw new Exception('Detetion of Project Proposal Message was unsuccessfull');
			return false;
		}
		
		return true;
	}
}
