<?php

namespace common\domain\project;

use common\domain\human\Customer;

interface IProjectRepository
{
    public function fetchAll();
    public function fetchAllForCustomer(Customer $customer);
    public function fetchOneForCustomer(Customer $customer);
    public function fetchById($id);
    public function save(Project $project);
    public function delete(Project $project);
}
