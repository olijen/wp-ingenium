<?php

namespace frontend\controllers\customer;

use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;

class Delete extends RestAction
{
    public function run($id)
    {
        $customer = CustomerRecord::findOne($id);
        
        if (is_null($customer)) {
            Yii::$app->getResponse()->setStatusCode(404);
            return;
        }
        
        if (false === $customer->delete()) {
            throw new Exception('Failed to delete the Customer for unknown reason.');
        }
        
        return true;
    }
}
