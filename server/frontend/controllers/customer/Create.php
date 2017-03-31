<?php

namespace frontend\controllers\customer;

use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;

class Create extends RestAction
{
	public function run()
	{
		$customer = new CustomerRecord;
		$customer->setAttributes(Yii::$app->getRequest()->getBodyParams());
		
		if (!$customer->save() && $customer->hasErrors()) {
			return $customer;
		} elseif (!$customer->id) {
			throw new Exception('Customer creation is failed for unknown reason');
		}
		return $customer;
	}
}
