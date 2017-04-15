<?php

namespace frontend\models\user;

use frontend\models\project\Project;

class Customer extends Human
{
    /**
     * @var Project[]
     */
    public $projects;

}
