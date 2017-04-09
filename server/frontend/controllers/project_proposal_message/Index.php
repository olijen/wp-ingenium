<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
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

		$ownerId = CustomerRecord::findOne(
			$project->customer_id
		)->user_id;
		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return ProjectProposalMessageRecord::find()->where(['project_id' => $project_id])->all();
	}
}
