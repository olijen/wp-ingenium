<?php

namespace common\domain\customer;

use common\models\CustomerRecord;

class CustomerRepository
{
    /**
     * @var CustomerRecord
     */
    private $customer;

    public function __construct()
    {
        $this->customer = new CustomerRecord;
    }

    /**
     * @param $id
     * @return CustomerRecord
     */
    public function fetchById($id)
    {
        
    }

    /**
     * @param $id
     * @return CustomerRecord
     */
    public function fetchByIdentityId($id)
    {
        return $this->customer->findOne(['user_id' => $id]);
    }

    public function fetchAll()
    {

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