<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;
use Yii;

class Index extends RestAction
{
	public function run($project_id)
	{
		return ProjectMessageRecord::find()->where([
			'user_id' => Yii::$app->user->identity->id,
			'project_id' => $project_id,
		])->all();
	}
}
