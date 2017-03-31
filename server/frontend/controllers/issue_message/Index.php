<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;

class Index extends RestAction
{
	public function run()
	{
		return IssueMessageRecord::find()->all();
	}
}
