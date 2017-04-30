<?php

namespace common\domain\project;

use common\components\Factory;
use common\domain\customer\Customer;
use frontend\models\user\Account;
use frontend\models\user\Human;

class HumanFactory extends Factory
{
    const HUMAN = 0;
    const CUSTOMER = 1;
    const MASTER = 2;

    /**
     * @param $type
     * @param $data
     * @param Account $account
     * @return Human
     */
    public static function create($data, Account $account, $type = self::HUMAN)
    {
        switch ($type) {
            case self::HUMAN:
                self::createHuman($data, $account);
                break;
            case self::CUSTOMER:
                self::createCustomer($data, $account);
                break;
            case self::MASTER:
                self::createMaster($data, $account);
                break;
        }
    }

    private function createHuman($data, Account $account)
    {
        
    }

    private function createCustomer($data, Account $account)
    {
        $customer = $this->convert($data, Customer::class);
    }

    private function createMaster($data, Account $account)
    {

    }
}