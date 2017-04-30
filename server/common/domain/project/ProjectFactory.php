<?php

namespace common\domain\project;

use common\components\Factory;
use common\components\ObjectConverter;
use common\domain\human\Customer;

class ProjectFactory extends Factory
{
    public static function create($data, Customer $customer)
    {
        return ObjectConverter::convert(array_merge($data, [
            'customer_id' => $customer->id
        ]), Project::class);
    }
}