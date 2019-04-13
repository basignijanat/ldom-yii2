<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id 
 * @property string $name
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
	
	public function beforeSave($insert)
	{
		if (!parent::beforeSave($insert)) {
			return false;
		}
		
		if ($insert)
		{
			$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
		}
		else
		{
			if ($new_password = Yii::$app->request->post('password_new') && strlen(Yii::$app->request->post('password_new')) > 0)
			{
				$this->password = Yii::$app->getSecurity()->generatePasswordHash($new_password);
			}
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
            [['age', 'experience'], 'integer'],
            [['name', 'education', 'email', 'password', 'image', 'eduprogram_ids'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\admin', 'ID'),            
            'name' => Yii::t('app\admin', 'Name'),            
            'age' => Yii::t('app\admin', 'Age'),
            'experience' => Yii::t('app\admin', 'Experience'),
            'education' => Yii::t('app\admin', 'Education'),
            'email' => Yii::t('app\admin', 'Email'),
            'password' => Yii::t('app\admin', 'Password'),
            'image' => Yii::t('app\admin', 'Image'),
            'eduprogram_ids' => Yii::t('app\admin', 'Curriculums'),
        ];
    }
	
	public static function getTeachers()
	{
		return ArrayForForm::getDropDownArray(Teacher::find()->all(), 'name');				
	}
	
	public static function getTeachersInString($ids = array(), $separator)
	{
		return implode($separator, ArrayForForm::getDropDownArray(Teacher::find()->where(['id' => $ids])->all(), 'name'));
	}
}
