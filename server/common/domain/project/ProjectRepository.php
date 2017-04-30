<?php

namespace common\domain\project;

use common\components\ObjectConverter;
use common\components\Repository;
use common\domain\human\Customer;
use common\domain\human\Master;

use yii\db\Query;
use Exception;
use Yii;

class ProjectRepository extends Repository implements IProjectRepository
{
    protected function getTable()
    {
        return 'project';
    }

    public function fetchById($id)
    {
        $row = (new Query())
            ->select('id, customer_id, name, description, url')
            ->from($this->getTable())
            ->where(['id' => $id])
            ->one();
        
        return ObjectConverter::convert($row, Project::class);
    }

    public function fetchAll()
    {
        $rows = (new Query())
            ->select('id, name, description, url')
            ->from($this->getTable())
            ->all();
        
        return ObjectConverter::convert($rows, Project::class);
    }

    public function fetchAllForCustomer(Customer $customer, array $condition = [])
    {
        $projectData = $this->fetchFor($customer, $condition)->all();
        return ObjectConverter::convert($projectData, Project::class);
    }
    
    public function fetchOneForCustomer(Customer $customer, array $condition = [])
    {
        $projectData = $this->fetchFor($customer, $condition)->one();
        return ObjectConverter::convert($projectData, Project::class);
    }

    public function save(Project $project)
    {
        $row = [
            'name' => $project->name,
            'url' => $project->url,
            'description' => $project->description,
        ];

        if ($project->id) {
            $this->update($row, ['id' => $project->id]);
        } else {
            $row['customer_id'] = $project->customer_id;
            $this->insert($row);
        }
    }

    public function delete(Project $project)
    {
        return $this->deleteById($project->id);
    }
    
//----------------------------------------------------------------------------------------------------------------------

    /**
     * @param $human
     * @param array $condition
     * @return Query
     * @throws Exception
     */
    private function fetchFor($human, array $condition = [])
    {
        if ($human instanceof Customer) {
            $condition['customer_id'] = $human->id;
        } elseif ($human instanceof Master) {
            $condition['master_id'] = $human->id;
        } else {
            throw new Exception("Тип не предусмотрен - $human");
        }
        
        return (new Query())
            ->select('id, customer_id, name, description, url')
            ->from($this->getTable())
            ->where($condition);
    }
}
