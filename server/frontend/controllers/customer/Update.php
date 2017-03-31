<?php

namespace frontend\controllers\customer;

use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$customer = CustomerRecord::findOne($id);
		
		if (is_null($customer)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$customer->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$customer->save();
		return $customer;
	}
}
