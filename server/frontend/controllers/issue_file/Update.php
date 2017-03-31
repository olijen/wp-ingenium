<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$issueFile = IssueFileRecord::findOne($id);
		
		if (is_null($issueFile)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$issueFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$issueFile->save();
		return $issueFile;
	}
}
