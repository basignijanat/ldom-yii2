<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\models\Userlang;
use app\models\AlertData;
use app\models\Setting;

AppAsset::register($this);
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

<? 
    $languages = UserLang::GetMenuLanguages();
    $alert = AlertData::getAlert($_GET['alert']);
    
    $logo_img = Setting::getSettingValue('logo_img');
    $logo_txt = Setting::getSettingValue('logo_txt');
    $phone = Setting::getSettingValue('phone');
    $email = Setting::getSettingValue('email');
    $default_user_img = Setting::getSettingValue('default_user_img');

    if (strlen($logo_img)){
        $nav_logo = Html::img($logo_img, [
            'style' => 'background-color: black; width: 100px; height: 35px; float: left;',
        ]);
    }
    else{
        $nav_logo = $logo_txt;
    }    

    
?>

<? 
    NavBar::begin(['brandLabel' => false,
        'options' => [
            'class' => 'navbar-dark bg-primary',
        ],
    ]);

    //echo $nav_logo;

    echo Nav::widget([
        'items' => [             
            [
                'label' => 'Home',
                'url' => ['site/index'],
                'linkOptions' => ['class' => 'btn btn-light'],
            ],
            [
                'label' => 'Dropdown',
                'items' => [
                    ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Dropdown Header</li>',
                    ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Login',
                'url' => ['site/login'],
                'visible' => Yii::$app->user->isGuest
            ],
        ],
        'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
    ]);

    NavBar::end();
?>

    <!--nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?= Yii::$app->homeUrl ?>">
                <? if (strlen($logo_img)): ?>
                    <?= Html::img($logo_img) ?>
                <? else: ?>
                    <?= $logo_txt ?>
                <? endif ?>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"><?= Yii::t('app\admin', 'Home') ?></span>
                <span aria-hidden="true"><?= Yii::t('app\admin', 'Contact') ?></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="/" class="navbar-item">
                    <?= Yii::t('app\admin', 'Home') ?>
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a href="/site/contact" class="navbar-link">
                        <?= Yii::t('app\admin', 'Contact') ?>
                    </a>
                    <div class="navbar-dropdown">
                        <?= Html::a(Yii::t('app\admin', $phone), 'tel:'.$phone, [
                            'class' => 'navbar-item',
                        ]) ?>                
                        <?= Html::a(Yii::t('app\admin', $email), 'mailto:'.$email, [
                            'class' => 'navbar-item',
                        ]) ?>  
                    </div>
                </div>
                <?= Html::beginForm('/site/search', 'post', [
                        'class' => 'field control',
                        'data-pjax' => '1',
                    ]) ?>                        
                    <a class="navbar-item">                                                             
                        <?= Html::input('text', 'search_data', null, [
                            'class' => 'input is-info is-rounded is-medium',                        
                            'placeholder' => Yii::t('app\main', 'What language would you like to learn?'),
                            'required' => true,  
                            'style' => 'margin: 10px; width: 350px;',
                        ]) ?>
                        <?= Html::submitButton(Yii::t('app\main', 'Search'), [
                            'class' => 'button is-info is-medium',                                
                        ]) ?>                                             
                    </a>                       
                <?= Html::endForm() ?>             
            </div>

            <div class="navbar-end">            
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">                    
                        <?= $languages[Yii::$app->language] ?>
                    </a>

                    <div class="navbar-dropdown is-right">
                        <? foreach ($languages as $key => $value): ?>
                            <? if (Yii::$app->language != $key): ?>
                                <?= Html::a($value, '?lang='.$key, [
                                    'class' => 'navbar-item',
                                ]) ?>
                            <? endif ?>
                        <? endforeach ?>                                    
                    </div>
                </div>

                <? if (Yii::$app->user->isGuest): ?>
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="/site/signup" class="button is-primary">
                                <strong><?= Yii::t('app\admin', 'Sign up') ?></strong>
                            </a>
                            <a href="/site/login" class="button is-light">
                                <?= Yii::t('app\admin', 'Log in') ?>
                            </a>
                        </div>
                    </div>
                <? else: ?>                    
                    <a href="/schedule" class="navbar-item">                         
                        <?= Yii::t('app\main', 'My Schedule') ?>
                    </a>                                  
                    <div class="navbar-item">                    
                        <div class="navbar-item has-dropdown is-hoverable">                        
                            <a class="navbar-link">                                                           
                            <? if (strlen(Yii::$app->user->identity->userpic)): ?>
                                        <?= Html::img(Yii::$app->user->identity->userpic, [
                                            'style' => 'border-radius: 100%',                                            
                                        ]) ?>
                                    <? else: ?>
                                        <?= Html::img($default_user_img, [
                                            'style' => 'border-radius: 100%',
                                        ]) ?>
                                    <? endif ?>
                                <span class="column">
                                    <? if (strlen(Yii::$app->user->identity->fname) == 0): ?>
                                        <?= Yii::$app->user->identity->username ?>
                                    <? else: ?>
                                        <?= Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname ?>
                                    <? endif ?>
                                </span>                                
                            </a>                           
                              
                            <div class="navbar-dropdown is-right">
                                <? if (Yii::$app->user->identity->isadmin): ?>
                                    <?= Html::a( Yii::t('app\admin', 'Admin Panel'), '/admin', ['class' => 'navbar-item']) ?>
                                <? endif ?>
                                <?= Html::a( Yii::t('app\main', 'Account Management'), '/cabinet', ['class' => 'navbar-item']) ?>
                                <?= Html::a( Yii::t('app\admin', 'Log out'), '/site/logout', [
                                    'class' => 'navbar-item',
                                    'data-method' => 'post',
                                ]) ?>                                                                
                            </div>
                        </div>                    
                    </div>
                <? endif ?>
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
