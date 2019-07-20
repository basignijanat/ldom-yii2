<?php

namespace app\controllers;

use Yii;

use app\models\Language;

class LanguageController extends \yii\web\Controller
{
    public function actionIndex($url)
    {
        if (Yii::$app->user->isGuest){
            $_SESSION['after_signup'] = '/language/'.$url;

            $this->redirect('/site/signup');
        }
        else{
            
            return $this->render('index', [
                'model' => $this->findModel($url),
                'signed_students' => '',
            ]);
        }
        
    }

    protected function findModel($url)
    {
        if (($model = Language::findOne(['url' => $url])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app\messages', 'The requested page does not exist.'));
    }

}
