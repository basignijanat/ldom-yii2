<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_data".
 *
 * @property int $id
 * @property string $name
 * @property int $language_id
 * @property int $student_ids
 * @property int $teacher_ids
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['language_id'], 'integer'],
            [['name', 'student_ids', 'teacher_ids'], 'string', 'max' => 255],
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
            'language_id' => Yii::t('app\admin', 'Language'),
            'student_ids' => Yii::t('app\admin', 'Students'),
            'teacher_ids' => Yii::t('app\admin', 'Teachers'),
        ];
    }
    
    public static function getGroup($id){

        return self::findOne(['id' => $id]);
    }

    public static function getGroups(){

        return self::find()->all();
    }
    
    public static function getGroupsByStudent($id){

        return Group::find()
            ->where(['like', 'student_ids', ' '.$id.' '])
            ->orWhere(['like', 'student_ids', $id.' %', false])
            ->orWhere(['like', 'student_ids', '% '.$id, false])
            ->orWhere(['student_ids' => $id])
            ->all();       
    }

    public static function getGroupsByStudentLanguage($id, $language_id){

        return Group::find()
            ->where(['like', 'student_ids', ' '.$id.' '])
            ->orWhere(['like', 'student_ids', $id.' %', false])
            ->orWhere(['like', 'student_ids', '% '.$id, false])
            ->orWhere(['student_ids' => $id])
            ->andWhere(['language_id' => $language_id])
            ->all();       
    }

    public static function getGroupsByTeacher($id){

        return Group::find()
            ->where(['like', 'teacher_ids', ' '.$id.' '])
            ->orWhere(['like', 'teacher_ids', $id.' %', false])
            ->orWhere(['like', 'teacher_ids', '% '.$id, false])
            ->orWhere(['teacher_ids' => $id])
            ->all();       
    }

    public function getTeachers(){

        return Teacher::find()->where(['id' => explode(' ', $this->teacher_ids)])->all();
    }

    public function getStudents(){

        return Student::find()->where(['id' => explode(' ', $this->student_ids)])->all();
    }
}
