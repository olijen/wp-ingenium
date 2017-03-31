<?php

namespace frontend\controllers\issue_file;

use frontend\components\RestAction;
use common\models\IssueFileRecord;

class Index extends RestAction
{
	public function run()
	{
		return IssueFileRecord::find()->all();
	}
}
