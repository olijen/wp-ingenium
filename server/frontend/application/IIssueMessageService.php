<?php

namespace frontend\application;

use common\domain\values\Message;

interface IIssueMessageService
{
    /**
     * @param int $issueId
     * @return Message[]
     */
    public function getAllByIssueId($issueId);

    /**
     * @param int $issueId
     * @param array $issueMessageData
     * @return int id
     */
    public function createByIssueId($issueId, array $issueMessageData);
}