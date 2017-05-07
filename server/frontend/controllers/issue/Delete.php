<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use Yii;

class Delete extends RestAction
{
    public function run($issue_id)
    {
        self::getIssueService()->deleteById($issue_id);
    }
}
