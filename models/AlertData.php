<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alert".
 *
 * @property int $id
 * @property int $code
 * @property string $content
 * @property string $class
 */
class AlertData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'content', 'class'], 'required'],
            [['code'], 'integer'],
            [['content', 'class'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\alert', 'ID'),
            'code' => Yii::t('app\alert', 'Code'),
            'content' => Yii::t('app\alert', 'Content'),
            'class' => Yii::t('app\alert', 'Class'),
        ];
    }

    public static function getAlertByCode($code){

        return self::find()->where(['code' => $code])->one();
    }
}
