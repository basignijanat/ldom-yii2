<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\models\Setting;

AppAsset::register($this);

$settings = Setting::getSettingValues(['logo_img', 'logo_txt', 'phone', 'email', 'default_user_img']);
$alert = $_GET['alert'];    

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>	
</head>
<body>
<?php $this->beginBody() ?>

    <? NavBar::begin([        
            'brandImage' => $settings['logo_img'],
            'brandLabel' => $settings['logo_txt'],        
            'options' => [
                'class' => 'navbar navbar-default navbar-static-top',
            ],
    ]) ?>

    <?= Nav::widget([
        'items' => [             
            [
                'label' => Yii::t('app\admin', 'Home'),
                'url' => '/',                
            ],
            [
                'label' => Yii::t('app\admin', 'Contact'),
                'items' => [
                    ['label' => Yii::t('app\admin', $settings['phone']), 'url' => 'tel:'.$settings['phone']],                    
                    ['label' => Yii::t('app\admin', $settings['email']), 'url' => 'mailto:'.$settings['email']],
                ],
            ],        
        ],
        'options' => ['class' => 'navbar-nav navbar-left'],
    ]) ?>

    <?= Nav::widget([
        'items' => [        
            Html::beginForm('/site/search', 'post', [
                'id' => 'search',
                'class' => 'navbar-form',
                'data-pjax' => '1',
            ]),                                    
            Html::input('text', 'search_data', null, [
                'class' => 'form-control',                        
                'placeholder' => Yii::t('app\main', 'What language would you like to learn?'),
                'required' => true,  
            ]),
            Html::submitButton(Yii::t('app\main', 'Search'), [
                'class' => 'btn btn-default',                                
            ]),            
            Html::endForm(),                
        ],
        'options' => ['class' => 'navbar-nav'],
    ]) ?>

    <? if (Yii::$app->user->isGuest): ?>
        <?= Nav::widget([
            'items' => [        
                [
                    'label' => Yii::t('app\main', 'Sign Up'),
                    'url' => '/site/signup',
                ],
                [
                    'label' => Yii::t('app\admin', 'Log in'),
                    'url' => '/site/login',
                ],
            ],        
            'options' => ['class' => 'navbar-nav navbar-right'],
        ]) ?>
    <? else: ?>
        <?= Nav::widget([
            'items' => [                    
                [
                    'label' => Yii::t('app\main', 'My Schedule'),
                    'url' => '/schedule',
                ],            
                [                                
                    'label' => strlen(Yii::$app->user->identity->userpic) ?
                        Html::img(Yii::$app->user->identity->userpic, ['class' => 'userpic']).Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname :
                        Html::img($settings['default_user_img'], ['class' => 'userpic']).Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname,                
                    'url' => '/schedule',
                    'encode' => false,
                    'linkOptions' => [
                        'class' => 'usermenu',
                    ],
                    'items' => [
                        [
                            'label' => Yii::t('app\admin', 'Admin Panel'), 
                            'url' => '/admin',                    
                        ],
                        [
                            'label' => Yii::t('app\main', 'Account Management'), 
                            'url' => '/cabinet'
                        ],
                        [
                            'label' => Yii::t('app\admin', 'Log out'), 
                            'url' => '/site/logout', 
                            'linkOptions' => [                            
                                'data-method' => 'post',
                            ],
                        ],
                    ],
                ],            
            ],        
            'options' => ['class' => 'navbar-nav navbar-right'],
        ]) ?>
    <? endif ?>                                

    <?= Nav::widget([
        'items' => [        
            [
                'label' => Yii::$app->params['languages'][Yii::$app->language]['label'],
                'items' => Yii::$app->params['languages'],
            ],
        ],
        'options' => ['class' => 'navbar-nav navbar-right'],
    ]) ?>

    <? NavBar::end() ?>
    
    <main class="main">        
        <?= Alert::widget() ?>
        
        <?= $content ?>
    </main>


    <?= $this->render('_footer', [
        'phone' => $settings['phone'],
        'email' => $settings['email'],
    ]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
