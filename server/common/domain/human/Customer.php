<?php

namespace common\domain\human;

use common\domain\project\Project;

class Customer extends Human
{
    //properties
    
    //states
    
    //relations
    
    /**
     * @var Project[]
     */
    private $projects;
    
    public function __construct($name, $email)
    {
        parent::__construct($name, $email);
    }
}
