<?php

namespace common\domain\project;

use common\components\DomainModel;
use common\domain\human\Customer;
use common\domain\issue\Issue;

class Project extends DomainModel
{
    //properties
    public $id;
    public $customer_id;
    public $name;
    public $url;
    public $description;

    public $requestedFields = [];

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
    
    public function makeNew()
    {
        
    }
    
    public function makePublicized()
    {
        
    }
    
    public function makeClosed()
    {
        
    }

    public function requestDataFields(array $fields)
    {
        foreach ($fields as $field) {
            $this->projectData->requestField($field);
        }
    }

    public function responseDataFields(array $fields)
    {
        foreach ($fields as $field) {
            $this->projectData->responseField($field);
        }
    }
}
