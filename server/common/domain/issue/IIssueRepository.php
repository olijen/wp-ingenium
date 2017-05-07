<?php

namespace common\domain\issue;

interface IIssueRepository
{
    public function fetchAllForCustomer();
    public function fetchAllByProjectIdForCustomer($projectId);
    public function detectByIdForCustomer($id);
    public function fetchByIdForCustomer($issueId);

    public function save(Issue $issue);
    public function removeById($issueId);
}
