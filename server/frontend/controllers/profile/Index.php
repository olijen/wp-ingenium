<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;

class Index extends RestAction
{
	public function run()
	{
		return ProfileRecord::find()->all();
	}
}
