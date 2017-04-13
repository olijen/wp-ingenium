<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{	
		if ($id != $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		return ProfileRecord::findOne($id);
	}
}
