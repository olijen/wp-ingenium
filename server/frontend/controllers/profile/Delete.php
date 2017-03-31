<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;
use Yii;

class Delete extends RestAction
{
	public function run($id)
	{
		$profile = ProfileRecord::findOne($id);
		
		if (is_null($profile)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		if (false === $profile->delete()) {
			throw new Exception('Detetion of Profile was unsuccessfull');
			return false;
		}
		
		return true;
	}
}
