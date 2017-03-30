<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$project = ProjectRecord::findOne($id);
		
		if (is_null($project)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		return $project;
	}
}
