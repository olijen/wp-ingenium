<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;
use Yii;

class Update extends RestAction
{
	public function run($id)
	{
		$projectProposalMessage = ProjectProposalMessageRecord::findOne($id);
		
		if (is_null($projectProposalMessage)) {
			Yii::$app->getResponse()->setStatusCode(404);
			return;
		}
		
		$projectProposalMessage->setAttributes(Yii::$app->getRequest()->getBodyParams());
		$projectProposalMessage->save();
		
		return $projectProposalMessage;
	}
}
