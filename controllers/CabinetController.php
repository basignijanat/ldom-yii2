<?php

namespace app\controllers;

use Yii;

use app\models\Userlang;
use app\models\User;


class CabinetController extends \yii\web\Controller
{
    public function __construct($id, $module, $config = []){
        if (Yii::$app->user->isGuest){
            $this->redirect('/');
        }


        Userlang::SetLanguage();

        return parent::__construct($id, $module, $config = []);
    }

    public function actionIndex(){
        $user = User::findIdentity(Yii::$app->user->identity->id);

        return $this->render('index', [
            'user' => $user,
            'base_properties' => $this->getBaseUserData($user),
            'sup_properties' => $this->getSupUserData($user),
        ]);
    }

    public function actionEdit(){
        $user = User::findIdentity(Yii::$app->user->identity->id);

        
        if ($user->load(Yii::$app->request->post()) && $user->username == Yii::$app->request->post('User')['username'] && $user->save()){            
            $this->redirect('/cabinet?alert=1.4');            
        }
        
        return $this->render('index', [
            'user' => $user,
            'base_properties' => $this->getBaseUserData($user),
            'sup_properties' => $this->getSupUserData($user),
        ]);
    }

    private function getBaseUserData($user){
        return [
            [
                'name' => 'username',
                'value' => $user->username,
                'title' => 'Email',
            ],
            [
                'name' => 'password_new',
                'value' => '****',
                'title' => 'Password',
            ],
        ];
    }

    private function getSupUserData($user){
        return [
            [
                'name' => 'fname',
                'value' => $user->fname,
                'title' => 'First Name',
            ],
            [
                'name' => 'mname',
                'value' => $user->mname,
                'title' => 'Middle Name',
            ],
            [
                'name' => 'lname',
                'value' => $user->lname,
                'title' => 'Last Name',
            ],
        ];
    }
}
