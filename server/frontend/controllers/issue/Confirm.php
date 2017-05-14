<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class Confirm extends RestAction
{ 
    public function run($issue_id)
    {
        return self::getIssueService()->confirmEstimate($issue_id);
    }
}
