<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

/**
 * This is the model class for table "price".
 *
 * @property int $id
 * @property string $eduform_id
 * @property string $name
 * @property int $value
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'value' => Yii::t('app\admin', 'Value'),
        ];
    }
	
	public static function getPrices()
	{
		return ArrayForForm::getDropDownArray(Price::find()->all(), 'name');				
	}
	
}
