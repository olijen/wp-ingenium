<?php

namespace frontend\models\issue;
use Exception;


class IssueStage
{
    const STAGE_PROPOSAL = 0;
    const STAGE_NEW = 0;

    public static $statusLabels = [
        self::STAGE_PROPOSAL => 'Stage proposal',
        self::STAGE_NEW => 'Stage new',
    ];

    public $state = self::STAGE_PROPOSAL;

    public function getStatusLabel()
    {
        if (empty(self::$statusLabels[$this->state])) {
            throw new Exception('Status label is unregistered');
        }
        return self::$statusLabels[$this->state];
    }

    public function __toString()
    {
        return $this->getStatusLabel();
    }
}