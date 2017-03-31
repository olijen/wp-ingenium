<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;
use common\models\IssueRecord;

class Index extends RestAction
{
    function run()
    {
		return IssueRecord::find()->all();
    }
}
