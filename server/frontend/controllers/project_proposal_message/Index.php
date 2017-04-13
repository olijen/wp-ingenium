<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use Yii;

class Index extends RestAction
{
	public function run($project_id)
	{
		$project = ProjectRecord::findOne($project_id);
		
		if (is_null($project)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		$user = $project->customer->user;
		if ($user->id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return $project->projectProposalMessages;
	}
}
