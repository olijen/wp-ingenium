<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$profile = ProfileRecord::findOne($id);
		
		if (is_null($profile)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$profile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$profile->save();
		
		return $profile;
	}
}
