<?php

namespace frontend\controllers\project_message;

use frontend\components\RestAction;
use common\models\ProjectMessageRecord;

class Index extends RestAction
{
	public function run()
	{
		return ProjectMessageRecord::find()->all();
	}
}
