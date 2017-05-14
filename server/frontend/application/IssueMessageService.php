<?php

namespace frontend\application;

use common\domain\issue\IIssueRepository;
use common\domain\project\IProjectRepository;

use common\domain\values\Message;
use Yii;

class IssueMessageService implements IIssueMessageService
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

    public function getAllByIssueId($issueId)
    {
        $issue = $this->issueRepository->fetchByIdForCustomer($issueId);
        return $issue->messages;
    }

    public function createByIssueId($issueId, array $messageData)
    {
        $issue = $this->issueRepository->fetchByIdForCustomer($issueId);
        $message = new Message(identity()->id);
        return $this->issueRepository->saveMessage($issue, $message);
    }
}
