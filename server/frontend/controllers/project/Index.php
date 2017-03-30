<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;

class Index extends RestAction
{
	public function run()
	{
		return ProjectRecord::find()->all();
	}
}
