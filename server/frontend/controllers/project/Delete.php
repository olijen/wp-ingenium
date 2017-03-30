<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use Yii;

class Delete extends RestAction
{
	public function run($id)
	{
		$project = ProjectRecord::findOne($id);
		
		if (is_null($project)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		if (false === $project->delete()) {
			throw new Exception('Detetion of Project was unsuccessfull');
			return false;
		}
		
		return true;
	}
}
