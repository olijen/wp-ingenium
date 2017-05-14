<?php

namespace frontend\application;

use common\domain\issue\Issue;

interface IIssueService
{
    /**
     * @param $issueId
     * @return Issue
     */
    public function getById($issueId);

    /**
     * @param $projectId
     * @return Issue[]
     */
    public function getAllByProjectId($projectId);

    /**
     * @param $projectId
     * @param array $issueData
     * @return int id
     */
    public function createByProjectId($projectId, array $issueData);

    /**
     * @param $issueId
     * @param array $issueData
     * @return bool
     */
    public function updateById($issueId, array $issueData);

    /**
     * @param $issueId
     * @return bool
     */
    public function deleteById($issueId);

    /**
     * @param $issueId
     * @return bool
     */
    public function confirmEstimate($issueId);

    /**
     * @param $issueId
     * @return bool
     */
    public function denyEstimate($issueId);
}
