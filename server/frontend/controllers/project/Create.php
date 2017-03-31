<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$project = new ProjectRecord;
		$project->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$project->save() && $project->hasErrors()) {
			return $project;
		} elseif (!$project->id) {
			throw new Exception('Creation of Project was aborted by unknown reason');
		}
		
		return $project;
	}
}
