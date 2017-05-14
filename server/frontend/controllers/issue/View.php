<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class View extends RestAction
{
    public function run($id)
    {
        return self::getIssueService()->getById($id);
    }
}
