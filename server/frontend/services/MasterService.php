<?php

namespace frontend\services;


use frontend\models\master\Master;
use frontend\models\values\Phone;

class MasterService
{

    static function getAllMasters()
    {
        MasterRecord::find()->orderBy('name')->all();
    }

    static function save(Master $master)
    {
        $masterRecord = new MasterRecord;
        $masterRecord->name = $master->name;
        return $masterRecord;
    }

    static function create(MasterRecord $masterRecord, PhoneRecord $phoneRecord)
    {
        $master = new Master($masterRecord->name);
        $master->phones[] = new Phone($phoneRecord->number);
        return $master;
    }
}