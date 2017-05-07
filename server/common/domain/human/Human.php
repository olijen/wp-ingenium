<?php

namespace common\domain\human;

use common\components\DomainModel;

class Human extends DomainModel
{
    //properties
    public $id;
    public $name;
    public $email;

    public $lastName;
    public $phone;
    public $skype;

    //states

    //relations
    /**
     * @var Account ?
     */
    public $account;

    //behaviors
    public function __construct($name, $email, $user)
    {
        $this->name = $name;
        $this->email = $email;
        $this->account = new Account($user);
    }

    public function messageTo(Human $human)
    {

    }
}
