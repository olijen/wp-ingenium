<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$project = ProjectRecord::findOne($id);
		
		if (is_null($project)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		if ($project->customer_id !== CustomerRecord::findOne(['user_id' => Yii::$app->user->identity->id])->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		$project->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$project->updated_date = time();
		$project->save();
		
		return $project;
	}
}
