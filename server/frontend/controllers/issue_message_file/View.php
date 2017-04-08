<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;
use common\models\IssueMessageRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$issueMessageFile = IssueMessageFileRecord::findOne($id);
		
		if (is_null($issueMessageFile)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$ownerId = IssueMessageRecord::findOne($issueMessageFile->issue_message_id)->user_id;
		if ($ownerId !== Yii::$app->user->identity->id) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}

		return $issueMessageFile;
	}
}
