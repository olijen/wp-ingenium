<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$issueMessageFile = new IssueMessageFileRecord;
		$issueMessageFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$issueMessageFile->save() && $issueMessageFile->hasErrors()) {
			return $issueMessageFile;
		} elseif (!$issueMessageFile->id) {
			throw new Exception('Creation of Issue Message File was aborted by unknown reason');
		}
		
		return $issueMessageFile;
	}
}
