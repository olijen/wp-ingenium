<?php

namespace frontend\models\user;

use frontend\models\issue\Issue;


class Master extends Human
{
    /**
     * @var Issue[]
     */
    public $issues;
}