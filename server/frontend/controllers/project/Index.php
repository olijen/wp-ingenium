<?php

namespace frontend\controllers\project;

use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;


class Index extends RestAction
{
    public function run()
    {
        $customer = CustomerRecord::findOne(['user_id' => $this->getUserId()]);
        return $customer->projects;
    }
}
