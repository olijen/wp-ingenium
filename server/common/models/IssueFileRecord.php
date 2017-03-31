<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue_file".
 *
 * @property integer $id
 * @property integer $issue_id
 * @property string $name
 * @property string $url
 * @property string $type
 *
 * @property Issue $issue
 */
class IssueFileRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issue_id', 'name', 'url', 'type'], 'required'],
            [['issue_id'], 'integer'],
            [['name', 'url', 'type'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['issue_id'], 'exist', 'skipOnError' => true, 'targetClass' => IssueRecord::className(), 'targetAttribute' => ['issue_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'issue_id' => 'Issue ID',
            'name' => 'Name',
            'url' => 'Url',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssue()
    {
        return $this->hasOne(IssueRecord::className(), ['id' => 'issue_id']);
    }
}
