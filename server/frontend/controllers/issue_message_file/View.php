<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;
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
		
		return $issueMessageFile;
	}
}
