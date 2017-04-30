<?php

namespace common\domain\project;

use common\components\DomainModel;
use common\domain\human\Customer;
use common\domain\issue\Issue;
use frontend\models\values\Message;

class Project extends DomainModel
{
    //properties
    public $id;
    public $customer_id;
    public $name;
    public $url;
    public $description;

    //states
    public $inProgress;

    //relations
    /**
     * @var Customer $customer
     */
    public $customer;
    /**
     * @var ProjectData
     */
    public $projectData;

    /**
     * @var Issue[]
     */
    public $issues;

    /**
     * @var Message[]
     */
    public $proposals;

    /**
     * crud only for Master
     * @var Message[]
     */
    public $comments;

    //behaviors
    public function __construct($name, $customer_id)
    {
        $this->name = $name;
        $this->customer_id = $customer_id;
    }
}
