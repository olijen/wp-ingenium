<?php
/**
 * Created by PhpStorm.
 * User: oleggrigoryev
 * Date: 15.03.17
 * Time: 15:45
 */

namespace frontend\models\user;


class Human
{
    public $name;
    public $lastName;
    public $email;
    public $phone;
    public $skype;

    /**
     * @var Account;
     */
    public $account;
}
