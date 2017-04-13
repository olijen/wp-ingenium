<?php

namespace frontend\controllers\master;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use common\models\IssueRecord;
use common\models\MasterRecord;
use Yii;

class View extends RestAction
{
    public function run($id)
    {
        $customer = CustomerRecord::findOne(['user_id' => $this->getUserId()]);
        
        $projectsIds = [];

        foreach ($customer->projects as $project) {
            $projectsIds[] = $project->id;
        }
        
        $issues = IssueRecord::find()->where(['project_id' => $projectsIds])->all();

        $mastersIds = [];

        foreach ($issues as $issue) {
            $mastersIds[] = $issue->master_id;
        }
        $mastersIds = array_unique($mastersIds);
        
        if (!in_array($id, $mastersIds)) {
            Yii::$app->getResponse()->setStatusCode(403);
            return;
        }

        return MasterRecord::findOne($id);
    }
}
