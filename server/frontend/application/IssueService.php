<?php

namespace frontend\application;

use common\domain\issue\IssueRepository;
use common\domain\issue\IssueFactory;
use common\domain\project\ProjectRepository;
use common\components\ObjectConverter;

use Yii;

class IssueService implements IIssueService
{
    /**
     * @var IssueRepository
     */
    private $issueRepository;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(IssueRepository $ir, ProjectRepository $pr)
    {
        $this->issueRepository = $ir;
        $this->projectRepository = $pr;
    }

    public function getAllByProjectId($projectId)
    {
        return $this->issueRepository->fetchAllByProjectIdForCustomer($projectId);
    }

    public function createByProjectId($projectId, array $issueData)
    {
        $project = $this->projectRepository->fetchByIdForCustomer($projectId);
        $issue = IssueFactory::createByProjectId($project->id, $issueData);
        return $this->issueRepository->save($issue);
    }

    public function getById($issueId)
    {
        return $this->issueRepository->fetchByIdForCustomer($issueId);
    }

    public function updateById($issueId, array $issueData)
    {
        $issue = $this->issueRepository->fetchByIdForCustomer($issueId);
        ObjectConverter::loadDataToObject($issueData, $issue);
        return $this->projectRepository->save($issue);
    }

    public function deleteById($issueId)
    {
        if ($this->issueRepository->detectByIdForCustomer($issueId)) {
            $this->issueRepository->removeById($issueId);
        }
    }
}
