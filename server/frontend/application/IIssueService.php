<?php

namespace frontend\application;

interface IIssueService
{
    public function getById($issueId);
    public function getAllByProjectId($projectId);
    public function createByProjectId($projectId, array $issueData);
    public function updateById($issueId, array $issueData);
    public function deleteById($issueId);
}