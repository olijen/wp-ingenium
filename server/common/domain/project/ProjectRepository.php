<?php

namespace common\domain\project;

use common\models\ProjectRecord;

class ProjectRepository
{
    public function __construct()
    {
        $this->project = new ProjectRecord();
    }

    public function fetchById()
    {

    }

    public function fetchAll()
    {

    }
    
    /**
     * @param $customerId
     * @return array|ProjectRecord[]
     */
    public function fetchAllForCustomer($customerId)
    {
        return $this->project->find()
            ->where(['customer_id' => $customerId])
            ->all();
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
