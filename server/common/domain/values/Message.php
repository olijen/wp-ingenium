<?php

namespace common\domain\values;

use common\domain\human\Human;

class Message
{
    //properties
    public $text;
    public $date;

    //states
    public $opened = false;

    //relations
    public $author_id;

    /**
     * @var Human
     */
    public $author;

    /**
     * @var File[]
     */
    public $files;

    public function __construct($author_id)
    {
        $this->author_id = $author_id;
    }
}
