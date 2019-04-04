<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $form_ids
 * @property string $fname
 * @property string $lname
 * @property int $age
 * @property int $experience
 * @property string $education
 * @property string $email
 * @property string $password
 * @property string $image
 * @property string $eduprogram_ids
 */
class Teacher extends \yii\db\ActiveRecord
{
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
            [['age', 'experience'], 'integer'],
            [['fname', 'lname', 'education', 'email', 'password', 'image', 'eduprogram_ids'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\messages', 'ID'),            
            'fname' => Yii::t('app\messages', 'Fname'),
            'lname' => Yii::t('app\messages', 'Lname'),
            'age' => Yii::t('app\messages', 'Age'),
            'experience' => Yii::t('app\messages', 'Experience'),
            'education' => Yii::t('app\messages', 'Education'),
            'email' => Yii::t('app\messages', 'Email'),
            'password' => Yii::t('app\messages', 'Password'),
            'image' => Yii::t('app\messages', 'Image'),
            'eduprogram_ids' => Yii::t('app\messages', 'Eduprogram Ids'),
        ];
    }
	
	public static function getTeachers()
	{
		return ArrayForForm::getDropDownArray(Teacher::find()->all(), 'fname');		
	}
	
}
