<?php

namespace common\domain\values;

use common\domain\human\Human;

class Message
{
    public $text;
    public $date;

    /**
     * @var File[]
     */
    public $files;

    /**
     * @var Human
     */
    public $author;
}
