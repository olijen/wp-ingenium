<?php

namespace frontend\controllers\issue_message;

use frontend\components\RestAction;
use common\models\IssueMessageRecord;
use common\models\IssueRecord;
use Yii;

class Create extends RestAction
{
    public function run($issue_id)
    {
        self::getIssueMessageService()->createByIssueId($issue_id, post());
    }
}
