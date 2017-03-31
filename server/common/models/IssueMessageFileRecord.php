<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue_message_file".
 *
 * @property integer $id
 * @property integer $issue_message_id
 * @property string $name
 * @property string $url
 * @property string $type
 *
 * @property IssueMessage $issueMessage
 */
class IssueMessageFileRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_message_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issue_message_id', 'name', 'url', 'type'], 'required'],
            [['issue_message_id'], 'integer'],
            [['name', 'url', 'type'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['issue_message_id'], 'exist', 'skipOnError' => true, 'targetClass' => IssueMessageRecord::className(), 'targetAttribute' => ['issue_message_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'issue_message_id' => 'Issue Message ID',
            'name' => 'Name',
            'url' => 'Url',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssueMessage()
    {
        return $this->hasOne(IssueMessageRecord::className(), ['id' => 'issue_message_id']);
    }
}
