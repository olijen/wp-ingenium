<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$profile = new ProfileRecord;
		
		$profile->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$profile->save();
		
		return $profile;
	}
}