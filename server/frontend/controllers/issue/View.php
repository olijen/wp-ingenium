<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use Yii;

class View extends RestAction
{
    public function run($id)
    {
		$issue = IssueRecord::findOne($id);
		
		if (!$issue) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		return $issue;
	}
}
