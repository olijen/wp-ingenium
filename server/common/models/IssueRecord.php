<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $master_id
 * @property string $name
 * @property string $description
 * @property string $deadline
 * @property string $stage
 * @property string $date
 * @property integer $master_price
 * @property string $master_deadline
 * @property string $master_comment
 * @property integer $created_date
 * @property integer $updated_date
 *
 * @property Master $master
 * @property Project $project
 * @property IssueFile[] $issueFiles
 * @property IssueMessage[] $issueMessages
 * @property Task[] $tasks
 */
class IssueRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'], // 'project_id',
            [['project_id', 'master_id', 'master_price', 'created_date', 'updated_date'], 'integer'],
            [['description', 'master_comment'], 'string'],
            [['master_deadline'], 'safe'],
            [['name', 'deadline', 'stage', 'date'], 'string', 'max' => 255],
            [['master_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterRecord::className(), 'targetAttribute' => ['master_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectRecord::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'master_id' => 'Master ID',
            'name' => 'Name',
            'description' => 'Description',
            'deadline' => 'Deadline',
            'stage' => 'Stage',
            'date' => 'Date',
            'master_price' => 'Master Price',
            'master_deadline' => 'Master Deadline',
            'master_comment' => 'Master Comment',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(MasterRecord::className(), ['id' => 'master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(ProjectRecord::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssueFiles()
    {
        return $this->hasMany(IssueFileRecord::className(), ['issue_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssueMessages()
    {
        return $this->hasMany(IssueMessageRecord::className(), ['issue_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(TaskRecord::className(), ['issue_id' => 'id']);
    }
    
    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->created_date = time();
        }
        $this->updated_date = time();
        
        return parent::beforeSave($insert);
    }
}
