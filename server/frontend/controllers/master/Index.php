<?php

namespace frontend\controllers\master;

use frontend\components\RestAction;
use common\models\ProjectRecord;
use common\models\CustomerRecord;
use common\models\IssueRecord;
use common\models\MasterRecord;
use Yii;

class Index extends RestAction
{
    function run()
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
		
    	return MasterRecord::find()->where(['id' => $mastersIds])->all();
    }
}
