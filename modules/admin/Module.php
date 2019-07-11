<?php

namespace app\modules\admin;

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
    public function init()
    {
        parent::init();

        Userlang::SetLanguage();
    }
}
