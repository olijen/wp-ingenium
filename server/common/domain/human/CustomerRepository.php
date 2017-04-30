<?php

namespace common\domain\human;

use common\components\ObjectConverter;
use common\components\Repository;
use common\models\UserRecord;

use Yii;
use yii\db\Query;

class CustomerRepository extends Repository
{
    protected function getTable()
    {
        return 'customer';
    }

    /**
     * @param $id
     * @return Customer
     */
    public function fetchById($id)
    {
        $row = (new Query())
            ->select('id')
            ->from($this->getTable())
            ->where(['user_id' => $id])
            ->one();

        /** @var UserRecord $user */
        $user = Yii::$app->user->identity;

        return ObjectConverter::convert(array_merge($row, [
            'name' => $user->username,
            'email' => $user->email,
        ]), Customer::class);
    }

    public function fetchAll()
    {

    }

    public function delete()
    {

    }

    public function save(Customer $customer)
    {
        
    }
}