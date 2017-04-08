<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Index extends RestAction
{
	public function run($issue_id)
	{

		$issue = IssueRecord::findOne($issue_id);
		
		if (!$issue) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$project = ProjectRecord::findOne(['id' => $issue->project_id]);
		$customer = CustomerRecord::findOne(['user_id' => Yii::$app->user->identity->id]);

		if ($project->customer_id !== $customer->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return IssueFileRecord::find()->where(['issue_id' => $issue->id])->all();
	}
}
