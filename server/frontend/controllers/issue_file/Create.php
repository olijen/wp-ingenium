<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$issueFile = new IssueFileRecord;
		$issueFile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$issueFile->save() && $issueFile->hasErrors()) {
			return $issueFile;
		}
		
		if (!$issueFile->id) {
			throw new Exception('Creation of Issue File is aborting for unknown reason');
		}
		
		return $issueFile;
	}
}
