<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use Yii;

class Index extends RestAction
{
	public function run($issue_id)
	{
		return IssueMessageRecord::find()->where([
			'user_id' => Yii::$app->user->identity->id,
			'issue_id' => $issue_id,
		])->all();
	}
}
