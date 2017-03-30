<?php

namespace frontend\controllers\task;

use frontend\components\RestAction;
use common\models\TaskRecord;

class Index extends RestAction
{
	public function run()
	{
		return TaskRecord::find()->all();
	}
}
