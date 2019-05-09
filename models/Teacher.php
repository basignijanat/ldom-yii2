<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id 
 * @property int $user_id
 * @property string $name
 * @property int $age
 * @property int $experience
 * @property string $education
 * @property string $eduprogram_ids
 */
class Teacher extends \yii\db\ActiveRecord
{	
		
	public function beforeSave($insert)
	{
		if (!parent::beforeSave($insert)) {
			return false;
		}		
		
		return true;
	}
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'experience', 'user_id'], 'integer'],
            [['name', 'education', 'eduprogram_ids'], 'string', 'max' => 255],		
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\admin', 'ID'),
			'user_id' => Yii::t('app\admin', 'User Email'),            
            'name' => Yii::t('app\admin', 'Name'),            
            'age' => Yii::t('app\admin', 'Age'),
            'experience' => Yii::t('app\admin', 'Experience'),
            'education' => Yii::t('app\admin', 'Education'),            
            'eduprogram_ids' => Yii::t('app\admin', 'Curriculums'),
        ];
    }
	
	public static function getTeachers()
	{
		return ArrayForForm::getDropDownArray(Teacher::find()->all(), 'name');				
	}
	
}
