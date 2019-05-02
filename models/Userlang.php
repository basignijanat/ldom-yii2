<?php

namespace app\models;

use Yii;
use app\components\NoEmptyDb;
use app\components\ArrayForForm;

/**
 * This is the model class for table "userlang".
 *
 * @property int $id
 * @property string $name
 * @property string $shortname
 * @property string $val
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
            [['name', 'shortname', 'val'], 'string', 'max' => 255],
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
            'shortname' => Yii::t('app\admin', 'Short Name'),
            'val' => Yii::t('app\admin', 'Value'),
        ];
    }
	
	public static function SetLanguage()
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
	
	public static function GetMenuLanguages()
	{
		NoEmptyDb::firstEntry(new Userlang, [
			'name' => 'English US',
			'shortname' => 'Eng',
			'val' => 'en-US',
		]);
		$languages = Userlang::find()->all();
		$menu_langs = array();
		foreach ($languages as $language)
		{
			$menu_langs[] = ['label' => $language['shortname'], 'url' => ['?lang='.$language['val']]];
		}
		return $menu_langs;
	}
	
	public static function getLanguageById($id)
	{
		return Userlang::find()->where(['id' => $id]);
	}
	
	public static function getLanguages()
	{
		return ArrayForForm::getDropDownArray(Userlang::find()->all(), 'name');		
	}
	
}
