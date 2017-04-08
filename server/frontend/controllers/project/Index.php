<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use Yii;


class Index extends RestAction
{
	public function run()
	{
		return ProjectRecord::find()->where([
			'customer_id' => CustomerRecord::findOne(['user_id' => Yii::$app->user->identity->id])->id
		])->all();
	}
}
