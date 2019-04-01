<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curriculum".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 */
class Curriculum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curriculum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\messages', 'ID'),
            'name' => Yii::t('app\messages', 'Name'),
            'content' => Yii::t('app\messages', 'Content'),
        ];
    }
}
