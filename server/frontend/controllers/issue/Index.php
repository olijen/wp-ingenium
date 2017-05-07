<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class Index extends RestAction
{    
    function run($project_id)
    {
        return self::getIssueService()->getAllByProjectId($project_id);
    }
}
