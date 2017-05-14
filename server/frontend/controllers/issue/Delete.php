<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use Yii;

class Delete extends RestAction
{
    public function run($id)
    {
        self::getIssueService()->deleteById($id);
    }
}
