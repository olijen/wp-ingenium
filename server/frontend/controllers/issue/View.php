<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class View extends RestAction
{
    public function run($issue_id)
    {
        return self::getIssueService()->getById($issue_id);
    }
}
