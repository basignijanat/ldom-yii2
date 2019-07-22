<?php

namespace app\controllers;

use Yii;

use app\models\Language;
use app\models\Student;
use app\models\Group;

class LanguageController extends \yii\web\Controller
{
    public function __construct($id, $module, $config = []){		        
        Userlang::SetLanguage();
        
        return parent::__construct($id, $module, $config = []);
    }
    
    public function actionIndex($url)
    {
        if (Yii::$app->user->isGuest){
            $_SESSION['after_signup'] = '/language/'.$url;

            $this->redirect('/site/signup');
        }
        else{            
            
            return $this->render('index', [
                'model' => $this->findModel($url),
                'is_signed' => Group::getGroupsByStudent(
                    Student::getStudentByUserId(
                        Yii::$app->user->identity->id)['id'], 
                        $this->findModel($url)['id']
                ),
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
