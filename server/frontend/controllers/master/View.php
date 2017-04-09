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
		$master = MasterRecord::findOne($id);

		if(is_null($master)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}

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

    	if (!in_array($id, $userMasters)) {
    		Yii::$app->getResponse()->setStatusCode(403);
			return;
    	}

    	return $master;
	}
}
