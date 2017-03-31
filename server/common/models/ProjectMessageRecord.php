<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_message".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property string $text
 * @property integer $created_date
 * @property integer $updated_date
 *
 * @property Project $project
 * @property User $user
 */
class ProjectMessageRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'text', 'created_date', 'updated_date'], 'required'],
            [['user_id', 'project_id', 'created_date', 'updated_date'], 'integer'],
            [['text'], 'string'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectRecord::className(), 'targetAttribute' => ['project_id' => 'id']],
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
            'project_id' => 'Project ID',
            'text' => 'Text',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
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
    public function getUser()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'user_id']);
    }
}
