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
}
