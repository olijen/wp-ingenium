<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class Deny extends RestAction
{ 
    public function run($issue_id)
    {
        return self::getIssueService()->denyEstimate($issue_id);
    }
}
