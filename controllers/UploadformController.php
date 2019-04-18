<?php

namespace app\controllers;
use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;

class UploadformController extends \yii\web\Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('index', ['model' => $model]);
    }

}
