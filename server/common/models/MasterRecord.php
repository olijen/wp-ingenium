<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "master".
 *
 * @property integer $id
 * @property integer $account_id
 *
 * @property Issue[] $issues
 * @property Account $account
 * @property ProjectProposalMessage[] $projectProposalMessages
 */
class MasterRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_id'], 'required'],
            [['account_id'], 'integer'],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountRecord::className(), 'targetAttribute' => ['account_id' => 'id']],
            [['account_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_id' => 'Account ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(Issue::className(), ['master_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectProposalMessages()
    {
        return $this->hasMany(ProjectProposalMessage::className(), ['master_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return MasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterQuery(get_called_class());
    }
}