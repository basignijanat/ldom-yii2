<?php

namespace app\models;

use Yii;

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
			[['user_id'], 'integer'],
            [['name', 'eduform_ids'], 'string', 'max' => 255],
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
            'eduform_ids' => Yii::t('app\admin', 'Curriculums'),
        ];
    }
}
