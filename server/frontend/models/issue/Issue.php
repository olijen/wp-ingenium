<?php

namespace frontend\models\issue;

use frontend\models\project\Project;
use frontend\models\user\Master;
use frontend\models\user\MasterData;
use frontend\models\values\File;
use frontend\models\values\Message;

class Issue
{
    public $name;
    public $description;
    public $deadline;
    public $date;

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
     * @var IssueStage
     */
    public $stage;

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

}