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
    	$userProjects = ProjectRecord::find()->where([
    		'customer_id' => CustomerRecord::findOne([
    			'user_id' => Yii::$app->user->identity->id
    		])->id
    	])->all();

    	$projectsId = [];

    	foreach ($userProjects as $project) {
    		$projectsId[] = $project->id;
    	}

    	$userIssues = IssueRecord::find()->where(['project_id' => $projectsId])->all();

    	$userMasters = [];

    	foreach ($userIssues as $issue) {
    		$userMasters[] = $issue->master_id;
    	}

    	return MasterRecord::find()->where(['id' => array_unique($userMasters)])->all();
    }
}
