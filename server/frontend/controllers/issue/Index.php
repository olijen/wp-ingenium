<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Index extends RestAction
{
    function run($project_id)
    {
		$project = ProjectRecord::findOne($project_id);

		if (is_null($project)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

		if ($project->customer_id !== CustomerRecord::findOne(['user_id' => Yii::$app->user->identity->id])->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return IssueRecord::find()->where(['project_id' => $project_id])->all();
    }
}
