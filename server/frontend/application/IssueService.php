<?php

namespace frontend\application;

use common\domain\project\IProjectRepository;
use common\domain\issue\IIssueRepository;
use common\components\ObjectConverter;
use common\domain\issue\IssueFactory;

use Yii;

class IssueService implements IIssueService
{
    /**
     * @var IIssueRepository
     */
    private $issueRepository;

    /**
     * @var IProjectRepository
     */
    private $projectRepository;

    public function __construct(IIssueRepository $ir, IProjectRepository $pr)
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
        return $this->issueRepository->save($issue);
    }

    public function deleteById($issueId)
    {
        if ($this->issueRepository->detectByIdForCustomer($issueId)) {
            $this->issueRepository->removeById($issueId);
        }
    }

    /**
     * Переводет issue в состояние "в работе". Используется, когда инженер провёл оценку задачи
     * @param $issueId
     * @return bool
     */
    public function confirmEstimate($issueId)
    {
        $issue = $this->issueRepository->fetchByIdForCustomer($issueId);
        $issue->stage->makeInWork();
        return $this->issueRepository->save($issue);
    }

    public function denyEstimate($issueId)
    {
        $issue = $this->issueRepository->fetchByIdForCustomer($issueId);
        $issue->stage->makeInConversation();
        return $this->issueRepository->save($issue);
    }
}
