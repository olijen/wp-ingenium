<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use common\models\ProjectRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$projectProposalMessage = new ProjectProposalMessageRecord;
		$projectProposalMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());

		$project = ProjectRecord::findOne($projectProposalMessage->project_id);
		$user = $project->customer->user;

		if ($user->id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$projectProposalMessage->save() && $projectProposalMessage->hasErrors()) {
			return $projectProposalMessage;
		} elseif (!$projectProposalMessage->id) {
			throw new Exception('Creation of Project Proposal Message was aborted by unknown reason');
		}
		
		return $projectProposalMessage;
	}
}
