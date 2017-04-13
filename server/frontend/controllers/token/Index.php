<?php

namespace frontend\controllers\token;

use frontend\components\RestAction;
use common\models\TokenRecord;

class Index extends RestAction
{
    public function run()
    {
        return TokenRecord::find()->all();
    }
}
