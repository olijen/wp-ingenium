<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
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

		$user = $projectProposalMessage->project->customer->user;

		if ($user->id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		return $projectProposalMessage;
	}
}
