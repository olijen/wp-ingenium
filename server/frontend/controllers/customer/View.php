<?php

namespace frontend\controllers\customer;

use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;

class View extends RestAction
{
	public function run($id)
	{
		$customer = CustomerRecord::findOne($id);
		
		if (!$customer) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		return $customer;
	}
}
