<?php

namespace common\domain\issue;

use common\domain\human\Master;
use common\domain\project\Project;

class Issue
{
    //properties
    public $name;
    public $description;
    public $deadline;
    public $date;

    //states
    /**
     * @var IssueStage
     */
    public $stage;


    //relations
    /**
     * @var Master
     */
    public $master;

    /**
     * @var Project
     */
    public $project;

    /**
     * @var MasterData
     */
    public $masterData;

    /**
     * @var Message[]
     */
    public $messages;

    /**
     * @var Task[]
     */
    public $tasks;

    /**
     * @var File[]
     */
    public $files;

    public function __construct()
    {

    }

}