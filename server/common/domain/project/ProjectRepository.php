<?php

namespace common\domain\project;

use common\components\ObjectConverter;
use common\components\Repository;

use Yii;

class ProjectRepository extends Repository implements IProjectRepository
{
    public function fetchByIdForCustomer($id)
    {
        $row = $this->query
            ->select('id, customer_id, name, description, url')
            ->from('project')
            ->where(['customer_id' => identity()->id])
            ->one();

        return ObjectConverter::convert($row, Project::class);
    }

    public function detectByIdForCustomer($id)
    {
            $row = $this->query
            ->select('id')
            ->from('project')
            ->where(['customer_id' => identity()->id])
            ->one();

        return $row !== null;
    }

    public function fetchAllForCustomer()
    {
        $rows = $this->query
            ->select('id, customer_id, name, description, url')
            ->from('project')
            ->where(['customer_id' => identity()->getId()])
            ->all();

        return ObjectConverter::convert($rows, Project::class);
    }

    public function save(Project $project)
    {
        $row = [
            'name' => $project->name,
            'url' => $project->url,
            'description' => $project->description,
        ];

        if ($project->id) {
            return $this->update($row, ['id' => $project->id]);
        } else {
            $row['customer_id'] = $project->customer_id;
            return $this->insert($row);
        }
    }

    public function removeById($projectId)
    {
        return $this->deleteById($projectId);
    }
}
