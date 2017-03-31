<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property integer $issue_id
 * @property string $name
 * @property string $description
 * @property string $time
 *
 * @property Issue $issue
 */
class TaskRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issue_id', 'name'], 'required'],
            [['issue_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'time'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'time' => 'Time',
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
