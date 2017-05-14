<?php

namespace frontend\controllers\issue;

use frontend\components\RestAction;

use Yii;

class Create extends RestAction
{ 
    public function run($project_id)
    {
        return self::getIssueService()->createByProjectId($project_id, Yii::$app->request->post());
    }
}
