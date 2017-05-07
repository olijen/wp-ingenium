<?php

namespace frontend\application;

interface ICustomerService
{
    public function getById($customerId);
    public function updateById($customerId, $customerData);
    public function deleteById($customerId);

    public function register($customerData);
    public function login($customerData);
}