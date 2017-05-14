<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class Update extends RestAction
{
    public function run($id)
    {
        self::getIssueService()->updateById($id, Yii::$app->request->post());
    }
}
