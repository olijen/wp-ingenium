<?php

namespace frontend\controllers\issue_message_file;

use frontend\components\RestAction;
use common\models\IssueMessageFileRecord;

class Index extends RestAction
{
	public function run()
	{
		return IssueMessageFileRecord::find()->all();
	}
}
