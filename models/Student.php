<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property int $user_id
 * @property string $eduform_ids
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			[['user_id', 'create_at'], 'integer'],            
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
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert) && $insert)
		{            
			$this->create_at = time();
            
            return true;
        }
        
        return false;       
    }

	public static function getStudents(){
        
        return ArrayForForm::getDropDownArrayCompound(new Student, new User, 'user_id', ['fname', 'mname', 'lname']);
    }
    
    public static function getStudentsCountBetween($lower, $upper){
        $students = self::find()->where(['>=', 'create_at', $lower])->andWhere(['<=', 'create_at', $upper])->all();
        
        if ($students){
            return count($students);
        }
        else{
            return 0;
        }
        
    }
}
