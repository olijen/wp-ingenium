<?php

namespace frontend\models\values;

use frontend\models\user\Human;

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