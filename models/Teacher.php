<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

use app\models\User;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id 
 * @property int $user_id
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
            [['education', 'eduprogram_ids'], 'string', 'max' => 255],		
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\admin', 'ID'),
			'user_id' => Yii::t('app\admin', 'User'),                        
            'age' => Yii::t('app\admin', 'Age'),
            'experience' => Yii::t('app\admin', 'Experience'),
            'education' => Yii::t('app\admin', 'Education'),            
            'eduprogram_ids' => Yii::t('app\admin', 'Curriculums'),
        ];
    }

    public function getFullName($patronymic = true){
        $user = User::find()->where(['id' => $this->user_id])->one();
        
        return $user->lname.' '.$user->fname.' '.$user->mname;
    }

    public static function getTeacherByUserId($user_id){
        
        return self::find()
            ->select(['id', 'user_id'])
            ->where(['user_id' => $user_id])
            ->one();
    }
	
	public static function getTeachers(){

        return ArrayForForm::getDropDownArrayCompound(new Teacher, new User, 'user_id', ['fname', 'mname', 'lname']);
	}
	
}
