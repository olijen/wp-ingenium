<?php

namespace common\domain\issue;

use Exception;

class IssueStage
{
    const STAGE_PROPOSAL = 0;
    const STAGE_NEW = 10;
    const STAGE_READY = 20;
    const STAGE_IN_CONVERSATION = 30;
    const STAGE_IN_ESTIMATED = 40;
    const STAGE_IN_WORK = 50;
    const STAGE_READY_FOR_TESTING = 60;
    const STAGE_FAILED_TESTING = 70;
    const STAGE_DONE = 80;

    public $state;

    private static $statusLabels = [
        self::STAGE_PROPOSAL => 'Задание в стадии предложения',
        self::STAGE_READY => 'Написать название',
        self::STAGE_IN_CONVERSATION => 'Написать название',
        self::STAGE_IN_ESTIMATED => 'Написать название',
        self::STAGE_IN_WORK => 'Написать название',
        self::STAGE_READY_FOR_TESTING => 'Написать название',
        self::STAGE_FAILED_TESTING => 'Написать название',
        self::STAGE_DONE => 'Написать название',
    ];

    public function __construct($state = self::STAGE_NEW)
    {
        $this->state = $state;
    }

    public function getStatusLabel()
    {
        if (empty(self::$statusLabels[$this->state])) {
            throw new Exception('Статус для состояния не зарегистрирован');
        }
        return self::$statusLabels[$this->state];
    }

    public function __toString()
    {
        return $this->getStatusLabel();
    }

    public function makeProposal()
    {

    }

    public function makeNew()
    {

    }

    public function makeReady()
    {

    }

    public function makeInConversation()
    {

    }

    public function makeInEstimated()
    {

    }

    public function makeInWork()
    {

    }

    public function makeReadyForTesting()
    {

    }

    public function makeFailedTesting()
    {

    }

    public function makeDone()
    {

    }
}