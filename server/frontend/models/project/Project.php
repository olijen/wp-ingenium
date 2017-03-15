<?php

namespace frontend\models\project;

use frontend\models\issue\Issue;
use frontend\models\values\Message;

class Project
{
    public $name;
    public $description;

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
}