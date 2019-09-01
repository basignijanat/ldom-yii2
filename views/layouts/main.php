<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\models\AlertData;
use app\models\Setting;

AppAsset::register($this);

$settings = Setting::getSettingValues(['logo_img', 'logo_txt', 'phone', 'email', 'default_user_img']);
$alert = AlertData::getAlert($_GET['alert']);    

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
        //'brandImage' => $settings['logo_img'],
        'brandLabel' => $settings['logo_txt'],        
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
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
    'options' => ['class' => 'navbar-nav navbar-left'], // set this to nav-tab to get tab-styled navigation
]) ?>

<?= Nav::widget([
    'items' => [        
        Html::beginForm('/search', 'post', [
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
                'url' => 'site/signup',
            ],
            [
                'label' => Yii::t('app\admin', 'Log in'),
                'url' => 'site/login',
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
                'image' => strlen(Yii::$app->user->identity->userpic) ? Html::img(Yii::$app->user->identity->userpic) : Html::img($settings['default_user_img']),
                'label' => Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname,                
                'url' => '/schedule',
            ],            
        ],        
        'options' => ['class' => 'navbar-nav navbar-right'],
    ]) ?>
<? endif ?>

                                <!--? if (strlen(Yii::$app->user->identity->userpic)): ?>
                                        <!-?= Html::img(Yii::$app->user->identity->userpic, [
                                            'style' => 'border-radius: 100%',                                            
                                        ]) ?>
                                    <!-? else: ?>
                                        <!?= Html::img($default_user_img, [
                                            'style' => 'border-radius: 100%',
                                        ]) ?>
                                    <!-? endif ?>
                                <span class="column">
                                    <!-? if (strlen(Yii::$app->user->identity->fname) == 0): ?>
                                        <!?= Yii::$app->user->identity->username ?>
                                    <!? else: ?>
                                        <!?= Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname ?>
                                    <!? endif ?-->

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

                
                    <!--a href="/schedule" class="navbar-item">                         
                        <!?= Yii::t('app\main', 'My Schedule') ?>
                    </a>                                  
                    <div class="navbar-item">                    
                        <div class="navbar-item has-dropdown is-hoverable">                        
                            <a class="navbar-link">                                                           
                                    <!? if (strlen(Yii::$app->user->identity->userpic)): ?>
                                        <!?= Html::img(Yii::$app->user->identity->userpic, [
                                            'style' => 'border-radius: 100%',                                            
                                        ]) ?>
                                    <!? else: ?>
                                        <!?= Html::img($default_user_img, [
                                            'style' => 'border-radius: 100%',
                                        ]) ?>
                                    <!? endif ?>
                                <span class="column">
                                    <!? if (strlen(Yii::$app->user->identity->fname) == 0): ?>
                                        <!?= Yii::$app->user->identity->username ?>
                                    <!? else: ?>
                                        <!?= Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname ?>
                                    <!? endif ?>
                                </span>                                
                            </a>                           
                              
                            <div class="navbar-dropdown is-right">
                                <!? if (Yii::$app->user->identity->isadmin): ?>
                                    <!?= Html::a( Yii::t('app\admin', 'Admin Panel'), '/admin', ['class' => 'navbar-item']) ?>
                                <!? endif ?>
                                <!?= Html::a( Yii::t('app\main', 'Account Management'), '/cabinet', ['class' => 'navbar-item']) ?>
                                <!?= Html::a( Yii::t('app\admin', 'Log out'), '/site/logout', [
                                    'class' => 'navbar-item',
                                    'data-method' => 'post',
                                ]) ?>                                                                
                            </div>
                        </div>                    
                    </div>
                <!? endif ?>
            </div>
        </div>
    </nav-->    
  <main class="main">        
    <? if ($alert): ?>
        <?= Html::beginTag('div', ['class' => $alert['class'].' has-text-centered']) ?>
            <?= Yii::t('app\alert', $alert['content']) ?>
        <?= Html::endTag('div') ?>    
    <? endif ?>
    
    <?= $content ?>
  </main>


    <?= $this->render('_footer', [
        'phone' => $phone,
        'email' => $email,
    ]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
