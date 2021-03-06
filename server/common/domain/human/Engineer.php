<?php

namespace common\domain\human;

use common\domain\issue\Issue;

class Engineer extends Human
{
    //properties

    //states
    public $ready = true;

    //relations
    /**
     * @var Issue[]
     */
    public $issues;

    //behaviors
    public function __construct($name, $email, $user)
    {
        parent::__construct($name, $email, $user);
    }

    public function makeReady()
    {
        $this->ready = true;
    }

    public function makeBusy()
    {
        $this->ready = false;
    }
}
