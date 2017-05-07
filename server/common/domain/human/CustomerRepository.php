<?php

namespace common\domain\human;

use common\components\ObjectConverter;
use common\components\Repository;
use common\models\UserRecord;

use Yii;
use yii\db\Query;

class CustomerRepository extends Repository implements ICustomerRepository
{
    /**
     * @param $id
     * @return Customer
     */
    public function fetchById($id)
    {
        $row = $this->query
            ->select('id')
            ->from($this->getTableName())
            ->where(['user_id' => $id])
            ->one();

        /** @var UserRecord $user */
        $user = identity();

        return ObjectConverter::convert(array_merge($row, [
            'name' => $user->username,
            'email' => $user->email,
            'user' => user()
        ]), Customer::class);
    }
}