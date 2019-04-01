<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $eduform_ids
 * @property string $email
 * @property string $password
 * @property string $image
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
            [['eduform_ids', 'email', 'password', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\messages', 'ID'),
            'eduform_ids' => Yii::t('app\messages', 'Eduform Ids'),
            'email' => Yii::t('app\messages', 'Email'),
            'password' => Yii::t('app\messages', 'Password'),
            'image' => Yii::t('app\messages', 'Image'),
        ];
    }
}
