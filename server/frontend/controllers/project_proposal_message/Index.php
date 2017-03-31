<?php

namespace frontend\controllers\project_proposal_message;

use frontend\components\RestAction;
use common\models\ProjectProposalMessageRecord;

class Index extends RestAction
{
	public function run()
	{
		return ProjectProposalMessageRecord::find()->all();
	}
}
