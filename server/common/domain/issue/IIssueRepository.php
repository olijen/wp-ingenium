<?php

namespace common\domain\issue;

use common\domain\values\Message;

interface IIssueRepository
{
    /**
     * @return Issue[]
     */
    public function fetchAllForCustomer();

    /**
     * @param $projectId
     * @return Issue[]
     */
    public function fetchAllByProjectIdForCustomer($projectId);

    /**
     * @param $id
     * @return bool
     */
    public function detectByIdForCustomer($id);

    /**
     * @param $issueId
     * @return Issue
     */
    public function fetchByIdForCustomer($issueId);

    /**
     * @param Issue $issue
     * @return bool
     */
    public function save(Issue $issue);

    /**
     * @param Issue $issue
     * @param Message $message
     * @return bool
     */
    public function saveMessageForIssue(Issue $issue, Message $message);

    /**
     * @param $issueId
     * @return bool
     */
    public function removeById($issueId);
}
