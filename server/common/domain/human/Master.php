<?php

namespace common\domain\human;

use frontend\models\issue\Issue;

class Master extends Human
{
    //properties

    //states
    public $readyForWork = true;

    //relations
    /**
     * @var Issue[]
     */
    public $issues;

    //behaviors
    public function __construct($name, $email)
    {
        parent::__construct($name, $email);
    }
}
