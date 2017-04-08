<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;

class Index extends RestAction
{
	public function run($issue_message_id)
	{
		return IssueMessageFileRecord::find()->where([
			'issue_message_id' => $issue_message_id
		])->all();
	}
}
