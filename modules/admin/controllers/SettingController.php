<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

use app\models\Setting;

class SettingController extends Controller
{
    public function actionIndex($id = null){
        $settings = Setting::find()->all();        

        if ($model = Setting::find()->where(['id' => $id])->one()){
            if($model->load(Yii::$app->request->post()) && $model->save()){            
                $this->redirect('/admin/setting?alert=2.1');
            }
        }

        return $this->render('index', [
            'settings' => $settings,
        ]);
    }

}
