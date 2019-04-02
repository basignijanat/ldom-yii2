<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $name
 * @property string $content
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'content'], 'string'],
            [['meta_title', 'name'], 'string', 'max' => 255],
			[['userlang_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\admin', 'ID'),
            'meta_title' => Yii::t('app\admin', 'Meta Title'),
            'meta_description' => Yii::t('app\admin', 'Meta Description'),
            'name' => Yii::t('app\admin', 'Name'),
            'content' => Yii::t('app\admin', 'Content'),
			'userlang_id' => Yii::t('app\admin', 'User Language'),
        ];
    }
	
	public static function getLanguages()
	{
		return ArrayForForm::getDropDownArray(Language::find()->all(), 'name');		
	}
	
}
