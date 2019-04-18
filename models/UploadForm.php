<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate())
		{
			$fullFileName = Yii::$app->basePath.'/upload/'.$this->imageFile->baseName.'.'.$this->imageFile->extension;
            $this->imageFile->saveAs($fullFileName);
            return $fullFileName;
        } else {
            return false;
        }
    }
}

?>