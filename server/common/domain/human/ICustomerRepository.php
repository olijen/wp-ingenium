<?php

namespace common\domain\human;

interface ICustomerRepository
{
    public function fetchById($customerId);
}