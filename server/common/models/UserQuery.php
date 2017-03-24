<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserRecord]].
 *
 * @see UserRecord
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
