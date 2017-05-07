<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class Update extends RestAction
{
    public function run($issue_id)
    {
        self::getIssueService()->updateById($issue_id, Yii::$app->request->post());
    }
}
