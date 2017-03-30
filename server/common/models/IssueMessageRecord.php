<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue_message".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $issue_id
 * @property string $text
 * @property integer $created_date
 * @property integer $updated_date
 *
 * @property Issue $issue
 * @property User $user
 * @property IssueMessageFile[] $issueMessageFiles
 */
class IssueMessageRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'issue_id', 'text', 'created_date', 'updated_date'], 'required'],
            [['user_id', 'issue_id', 'created_date', 'updated_date'], 'integer'],
            [['text'], 'string'],
            [['issue_id'], 'exist', 'skipOnError' => true, 'targetClass' => IssueRecord::className(), 'targetAttribute' => ['issue_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRecord::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'issue_id' => 'Issue ID',
            'text' => 'Text',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssue()
    {
        return $this->hasOne(IssueRecord::className(), ['id' => 'issue_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssueMessageFiles()
    {
        return $this->hasMany(IssueMessageFileRecord::className(), ['issue_message_id' => 'id']);
    }
}
