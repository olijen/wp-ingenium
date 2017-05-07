<?php

namespace common\domain\issue;

use common\components\DomainModel;
use common\domain\human\Master;
use common\domain\project\Project;
use common\domain\values\File;
use common\domain\values\Message;
use frontend\models\issue\Task;

class Issue extends DomainModel
{
    //properties
    public $id;
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
     * @var int ID of Project
     */
    public $project_id;
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

    //behaviors
    public function __construct($name, $project_id, $stage)
    {
        $this->name = $name;
        $this->project_id = $project_id;
        $this->stage = new IssueStage($stage);
    }
}
