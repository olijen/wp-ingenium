<?php

namespace common\domain\human;
use yii\web\User;

/**
 * Адаптер для перехода от системного аккаунта к предметной области
 * Class AccountAdapter
 * @package frontend\models\user
 */
class Account
{
    public $id;

    /**
     * @var User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
