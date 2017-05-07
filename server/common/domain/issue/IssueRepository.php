<?php

namespace common\domain\issue;

use common\components\ObjectConverter;
use common\components\Repository;

use Yii;

class IssueRepository extends Repository implements IIssueRepository
{
    public function fetchAllForCustomer()
    {
        $rows = $this->query
            ->select('issue.id, issue.name, issue.description, issue.project_id')
            ->from('issue')
            ->leftJoin('project', 'project.id = issue.id')
            ->leftJoin('customer', 'customer.id = issue.id')
            ->where('customer.id=:customer_idd', [
                'customer_id' => identity()->id
            ])->all();

        return ObjectConverter::convert($rows, Issue::class);
    }

    public function fetchAllByProjectIdForCustomer($projectId)
    {
        $rows = $this->query
            ->select('issue.id, issue.name, issue.description, issue.project_id')
            ->from('issue')
            ->leftJoin('project', 'project.id = issue.project_id')
            ->leftJoin('customer', 'customer.id = project.customer_id')
            ->where('customer.id=:customer_id AND project.id=:project_id    ', [
                'customer_id' => identity()->id,
                'project_id' => $projectId,
            ])->all();

        return ObjectConverter::convert($rows, Issue::class);
    }

    public function fetchByIdForCustomer($issueId)
    {
        $rows = $this->query
            ->select('issue.id, issue.name, issue.description, issue.project_id')
            ->from('issue')
            ->leftJoin('project', 'project.id = issue.id')
            ->leftJoin('customer', 'customer.id = issue.id')
            ->where('issue.id=:issue_id AND customer.id=:customer_id', [
                'issue_id' => $issueId,
                'customer_id' => identity()->id
            ])->one();

        return ObjectConverter::convert($rows, Issue::class);
    }

    public function detectByIdForCustomer($issueId)
    {
        $row = $this->query
            ->select('issue.id')
            ->from('issue')
            ->leftJoin('project', 'project.id = issue.id')
            ->leftJoin('customer', 'customer.id = issue.id')
            ->where('issue.id=:issue_id AND customer.id=:customer_id', [
                'issue_id' => $issueId,
                'customer_id' => identity()->id
            ])->one();
        return $row !== null;
    }

    public function save(Issue $issue)
    {
        $row = [
            'name' => $issue->name,
            'description' => $issue->description,
        ];

        if ($issue->id) {
            return $this->update($row, ['id' => $issue->id]);
        } else {
            $row['project_id'] = $issue->project_id;
            return $this->insert($row);
        }
    }

    public function removeById($issueId)
    {
        return $this->deleteById($issueId);
    }
}
