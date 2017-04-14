<?php

namespace frontend\controllers\customer;

use frontend\components\RestAction;
use common\models\CustomerRecord;

class Index extends RestAction
{
    public function run()
    {
        return CustomerRecord::find()->all();
    }
}
