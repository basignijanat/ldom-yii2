<?php

namespace app\models;

use yii\helpers\Html;
use yii\web\UploadedFile;

use Yii;
use yii\base\Model;

class Image extends Model
{
    public $temp_image;
    public $temp_image_url;

    public function rules()
    {
        return [
            [['temp_image',], 'file', 'extensions' => 'png, jpg'],
            [['temp_image_url',], 'string'],
        ];
    }

    public static function getUploadDir(){
        
        return 'uploads/temp/';
    }

    public static function getSessionNames(){
        
        return [
            'temp_image',
        ];
    }

    public function viewForm(){

        return Html::beginForm('', 'post', ['id' => 'image', 'data-pjax' => '1']).
            Html::activeFileInput($this, 'temp_image').
            Html::activeHiddenInput($this, 'temp_image_url').
            Html::endForm();
    }

    public function viewImg($img_src){
        $scr = '';

        /*if (Yii::$app->session->get(self::getSessionNames()[0])){
            $scr = Yii::$app->session->get(self::getSessionNames()[0]);
        }
        else*/if (isset($img_src)){
            $scr = $img_src;
        }

        return Html::img($scr, [
            'id' => 'langImage', 
            'width' => '360px',
            'height' => '480px',
            'alt' => 'Image',
        ]).
        //Html::tagbegin
        Html::button('Done', ['id' => 'crop_done']);
    }
    
    public function uploadTemp(){
        if ($this->temp_image = UploadedFile::getInstance($this, 'temp_image')){
            do{
                $filename = uniqid('tmp_');
                $full_filename = self::getUploadDir().$filename.'.'.$this->temp_image->extension;
            }
            while (file_exists($full_filename));

            $this->temp_image->saveAs($full_filename);
            //Yii::$app->session->set(self::getSessionNames()[0], "/web/$full_filename");
            $this->temp_image_url = "/web/$full_filename";
                
                return true;
        }
        
        return false;
    }

    public function uploadCropped($data, $dest, $prefix, $ext){        
        do{
            $filename = uniqid("${prefix}_").$ext;
        }
        while (file_exists($dest.$filename));

        if (file_put_contents(
            $dest.$filename, 
            base64_decode(
                preg_replace(
                    '#^data:image/\w+;base64,#i', 
                    '', 
                    $data
                )
            )
        )){
            //Yii::$app->session->remove(self::getSessionNames()[0]);
            
            return $filename;
        }

        return false;
    }
}