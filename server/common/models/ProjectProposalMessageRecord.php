<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_proposal_message".
 *
 * @property integer $id
 * @property integer $master_id
 * @property integer $project_id
 * @property string $text
 * @property integer $created_date
 * @property integer $updated_date
 *
 * @property Project $project
 * @property Master $master
 */
class ProjectProposalMessageRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_proposal_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['master_id', 'project_id', 'text'], 'required'],
            [['master_id', 'project_id', 'created_date', 'updated_date'], 'integer'],
            [['text'], 'string'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectRecord::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['master_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterRecord::className(), 'targetAttribute' => ['master_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'master_id' => 'Master ID',
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
    public function getMaster()
    {
        return $this->hasOne(MasterRecord::className(), ['id' => 'master_id']);
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
