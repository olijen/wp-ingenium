<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$issueFile = IssueFileRecord::findOne($id);
		
		if (is_null($issueFile)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		$project = ProjectRecord::findOne(['id' => IssueRecord::findOne($issueFile->issue_id)->project_id]);
		$customer = CustomerRecord::findOne(['user_id' => Yii::$app->user->identity->id]);

		if ($project->customer_id !== $customer->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		return $issueFile;
	}
}
