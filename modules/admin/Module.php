<?php

namespace app\modules\admin;

use Yii;
use yii\helpers\Url;

use app\models\Userlang;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'admin.php';
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init(){
        
        if (!Yii::$app->user->identity->isadmin){
            Yii::$app->response->redirect(Url::to(['/']))->send();
        }

        Userlang::SetLanguage();

        return parent::init();
    }
}
