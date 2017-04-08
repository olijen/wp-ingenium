<?php

namespace frontend\controllers\profile;

use frontend\components\RestAction;
use common\models\ProfileRecord;
use Yii;

class Index extends RestAction
{
	public function run()
	{
		return ProfileRecord::find()->where([
			'user_id' => Yii::$app->user->identity->id
		])->all();
	}
}
