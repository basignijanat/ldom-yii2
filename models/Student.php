<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

use app\models\User;

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
            [['user_id', 'age', 'create_at'], 'integer'],            
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
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
		{
            if ($insert){
                $this->create_at = time();
            }            			
            
            return true;
        }
        
        return false;       
    }

    public function getFullName($patronymic = true){
        $user = User::find()->where(['id' => $this->user_id])->one();
        
        return $user->getFullName($patronymic);
    }

	public static function getStudents(){
        
        return ArrayForForm::getDropDownArrayCompound(new Student, new User, 'user_id', ['fname', 'mname', 'lname']);
    }

    public static function getStudentByUserId($user_id){
        
        return self::find()
            ->select(['id', 'user_id'])
            ->where(['user_id' => $user_id])
            ->one();
    }

    public function getUser(){
        
        return User::find()            
            ->where(['id' => $this->user_id])
            ->one();
    }
    
    public static function getStudentsCountBetween($lower, $upper){
        
        return self::find()
            ->where(['>=', 'create_at', $lower])
            ->andWhere(['<=', 'create_at', $upper])
            ->count();        
    }

    public static function getTotalStudentsCount()
    {

        return self::find()->count();         
    }
}
