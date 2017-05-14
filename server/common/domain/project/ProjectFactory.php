<?php

namespace common\domain\project;

use common\components\Factory;
use common\components\ObjectConverter;

class ProjectFactory extends Factory
{
    /**
     * @param array $customerData
     * @return Project
     */
    public static function create(array $customerData)
    {
        return ObjectConverter::convert(array_merge($customerData, [
            'customer_id' => identity()->id
        ]), Project::class);
    }
}
