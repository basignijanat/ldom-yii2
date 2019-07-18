<?php

namespace app\controllers;

use Yii;

use app\models\Userlang;
use app\models\User;

class CabinetController extends \yii\web\Controller
{
    public function __construct($id, $module, $config = []){		
        if (Yii::$app->user->isGuest){
            Yii::$app->response->redirect(Url::to(['/']))->send();
        }

        Userlang::SetLanguage();
        
        return parent::__construct($id, $module, $config = []);
    }

    public function actionIndex(){
        $user = User::findIdentity(Yii::$app->user->identity->id);                         

        return $this->render('index', [
            'user' => $user,
        ]);
    }

    public function actionEdit(){
        $user = User::findIdentity(Yii::$app->user->identity->id);        
        
        if ($user->load(Yii::$app->request->post()) && $user->username == Yii::$app->request->post('User')['username'] && $user->save()){            
            $this->redirect('/cabinet?alert=1.4');            
        }
        
        return $this->render('index', [
            'user' => $user,
        ]);
    }
}
