<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $lastName
 * @property string $phone
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_date
 * @property integer $updated_date
 *
 * @property Customer[] $customers
 * @property IssueMessage[] $issueMessages
 * @property Master[] $masters
 * @property ProjectMessage[] $projectMessages
 */
class AccountRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'auth_key', 'password_hash', 'created_date', 'updated_date'], 'required'],
            [['status', 'created_date', 'updated_date'], 'integer'],
            [['email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['name', 'lastName'], 'string', 'max' => 55],
            [['phone'], 'string', 'max' => 15],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['email', 'auth_key', 'password_hash', 'created_date', 'updated_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'lastName' => 'Last Name',
            'phone' => 'Phone',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(CustomerRecord::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssueMessages()
    {
        return $this->hasMany(IssueMessageRecord::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasters()
    {
        return $this->hasMany(MasterRecord::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectMessages()
    {
        return $this->hasMany(ProjectMessageRecord::className(), ['account_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccountQuery(get_called_class());
    }
}