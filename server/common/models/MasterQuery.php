<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Master]].
 *
 * @see Master
 */
class MasterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Master[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Master|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
