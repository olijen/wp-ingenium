<?php

namespace common\domain\human;

use common\domain\project\Project;

var_dump('qwwerty');
exit();

class Customer extends Human
{
    //properties
    
    //states
    
    //relations
    
    /**
     * @var Project[]
     */
    private $projects;
    
    public function __construct($name, $email, $user)
    {
        parent::__construct($name, $email, $user);
    }
}
