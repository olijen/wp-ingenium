<?php
//Таски - это задачи, которые мастер выполнил и добавил после выполнения.

namespace frontend\models\issue;

use frontend\models\values\File;

class Task
{
    public $name;
    public $description;
    public $time;

    /**
     * @var \DateTime
     */
    public $date;

    /**
     * @var File[]
     */
    public $files;
}