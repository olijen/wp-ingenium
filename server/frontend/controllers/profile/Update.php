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
		
		if ($profile->user_id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		$profile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if ($profile->user_id !== $this->getUserId()) {
			Yii::$app->getResponse()->setStatusCode(403);
			return;
		}
		
		if (!$profile->save() && $profile->hasErrors()) {
			return $profile;
		}
		
		return $profile;
	}
}
