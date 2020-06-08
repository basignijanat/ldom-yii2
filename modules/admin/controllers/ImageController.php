<?php

namespace app\modules\admin\controllers;

class ImageController extends \yii\web\Controller
{
    public function actionUploadRaw()
    {
        return $this->render('upload-raw');
    }

}
