<?php

namespace frontend\controllers\master;

use frontend\components\RestAction;
use Yii;

class Delete extends RestAction
{
	public function run($id)
	{
		Yii::$app->getResponse()->setStatusCode(403);
		return;
	}
}
