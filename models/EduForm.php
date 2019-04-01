<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eduform".
 *
 * @property int $id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $name
 * @property string $content
 * @property string $language_id
 * @property string $teacher_ids
 * @property string $prices
 */
class EduForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eduform';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'content'], 'string'],
            [['meta_title', 'name', 'language_id', 'teacher_ids', 'prices'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\messages', 'ID'),
            'meta_title' => Yii::t('app\messages', 'Meta Title'),
            'meta_description' => Yii::t('app\messages', 'Meta Description'),
            'name' => Yii::t('app\messages', 'Name'),
            'content' => Yii::t('app\messages', 'Content'),
            'language_id' => Yii::t('app\messages', 'Language ID'),
            'teacher_ids' => Yii::t('app\messages', 'Teacher Ids'),
            'prices' => Yii::t('app\messages', 'Prices'),
        ];
    }
}
