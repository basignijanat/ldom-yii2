<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userlang".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $value
 */
class Userlang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */    
	public static function tableName()
    {
        return 'userlang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name', 'value'], 'string', 'max' => 255],
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
            'short_name' => Yii::t('app\admin', 'Short Name'),
            'value' => Yii::t('app\admin', 'Value'),
        ];
    }
	public static function Setlang()
	{
		if (isset($_COOKIE['userlang']))
		{
			Yii::$app->language = $_COOKIE['userlang'];
		}
		else
		{	
			setcookie('userlang', Yii::$app->language);
		}
		if (isset($_GET['lang']))
		{
			setcookie('userlang', $_GET['lang']);
			Yii::$app->language = $_GET['lang'];
		}
	}	
}
