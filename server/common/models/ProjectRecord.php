<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $ftp_host
 * @property string $ftp_login
 * @property string $ftp_pwd
 * @property string $ssh_host
 * @property string $ssh_login
 * @property string $ssh_key
 * @property string $repo_url
 * @property string $repo_login
 * @property string $repo_pwd
 * @property string $database_host
 * @property string $database_login
 * @property string $database_pwd
 * @property string $server_url
 * @property string $server_login
 * @property string $server_pwd
 * @property integer $admin_url
 * @property integer $admin_login
 * @property integer $admin_password
 * @property integer $created_date
 * @property integer $updated_date
 *
 * @property Issue[] $issues
 * @property Customer $customer
 * @property ProjectMessage[] $projectMessages
 * @property ProjectProposalMessage[] $projectProposalMessages
 */
class ProjectRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'name', 'created_date', 'updated_date'], 'required'],
            [['customer_id', 'admin_url', 'admin_login', 'admin_password', 'created_date', 'updated_date'], 'integer'],
            [['description'], 'string'],
            [['name', 'url', 'ftp_host', 'ftp_login', 'ftp_pwd', 'ssh_host', 'ssh_login', 'ssh_key', 'repo_url', 'repo_login', 'repo_pwd', 'database_host', 'database_login', 'database_pwd', 'server_url', 'server_login', 'server_pwd'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerRecord::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'description' => 'Description',
            'url' => 'Url',
            'ftp_host' => 'Ftp Host',
            'ftp_login' => 'Ftp Login',
            'ftp_pwd' => 'Ftp Pwd',
            'ssh_host' => 'Ssh Host',
            'ssh_login' => 'Ssh Login',
            'ssh_key' => 'Ssh Key',
            'repo_url' => 'Repo Url',
            'repo_login' => 'Repo Login',
            'repo_pwd' => 'Repo Pwd',
            'database_host' => 'Database Host',
            'database_login' => 'Database Login',
            'database_pwd' => 'Database Pwd',
            'server_url' => 'Server Url',
            'server_login' => 'Server Login',
            'server_pwd' => 'Server Pwd',
            'admin_url' => 'Admin Url',
            'admin_login' => 'Admin Login',
            'admin_password' => 'Admin Password',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssues()
    {
        return $this->hasMany(IssueRecord::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(CustomerRecord::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectMessages()
    {
        return $this->hasMany(ProjectMessageRecord::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectProposalMessages()
    {
        return $this->hasMany(ProjectProposalMessageRecord::className(), ['project_id' => 'id']);
    }
}
