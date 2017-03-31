<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;
use Yii;

class Create extends RestAction
{ 
    public function run()
    {
		$issue = new IssueRecord;
		$issue->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$issue->save() && $issue->hasErrors()) {
			return $issue;
		} elseif (!$issue->id) {
			throw new Exception('Creation of Issue was aborted by unknown reason');
		}
		return $issue;
    }
}
