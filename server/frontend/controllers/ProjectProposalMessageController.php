<?php

namespace frontend\controllers;

use frontend\components\RestController;

class ProjectProposalMessageController extends RestController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\controllers\project_proposal_message\Index',
            ],
            'view' => [
                'class' => 'frontend\controllers\project_proposal_message\View',
            ],
            'create' => [
                'class' => 'frontend\controllers\project_proposal_message\Create',
            ],
            'update' => [
                'class' => 'frontend\controllers\project_proposal_message\Update',
            ],
            'delete' => [
                'class' => 'frontend\controllers\project_proposal_message\Delete',
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
