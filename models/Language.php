<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;
use yii\web\UploadedFile;

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
    public $image_file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'content'], 'string'],
            [['meta_title', 'name', 'image', 'url'], 'string', 'max' => 255],
            [['userlang_id'], 'integer'],
            [['url'], 'unique'],
            [['image_file'], 'file', 'extensions' => 'png, jpg'],
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
            'url' => Yii::t('app\admin', 'URL'),
            'image' => Yii::t('app\admin', 'Image'),
            'image_file' => Yii::t('app\admin', 'Download Image'),
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
		{			
			$this->uploadImage();
            
            return true;
        }
        
        return false;       
    }

	public static function getLanguages()
	{
		return ArrayForForm::getDropDownArray(Language::find()->all(), 'name', null);		
	}
	
	public static function getLanguageById($id)
	{
		return Language::find()->where(['id' => $id])->one();		
    }
    
    protected function uploadImage(){
        if ($this->image_file = UploadedFile::getInstance($this, 'image_file')){
			$fullFileName = 'upload/language/'.uniqid('language_').'.'.$this->image_file->extension;
			$this->image_file->saveAs($fullFileName);
			$this->image = '/web/'.$fullFileName;
		}
    }
}
