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
    $languages = UserLang::GetMenuLanguages() ;
    $alert = AlertData::getAlert($_GET['alert']);
?>

<div class="wrap">
    <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?= Yii::$app->homeUrl ?>">
                <!--img src="http://readysteadylife.eu/wp-content/uploads/2015/06/iconmonstr-language-9-icon-256.png" width="256"-->
                <?= Yii::$app->name ?>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="/site/index" class="navbar-item">
                    <?= Yii::t('app\admin', 'Home') ?>
                </a>

                <a href="/site/contact" class="navbar-item">
                    <?= Yii::t('app\admin', 'Contact') ?>
                </a>
            </div>

            <div class="navbar-end">            
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">                    
                        <?= $languages[Yii::$app->language] ?>
                    </a>

                    <div class="navbar-dropdown">
                        <? foreach ($languages as $key => $value): ?>
                            <? if (Yii::$app->language != $key): ?>
                                <a href="?lang=<?= $key ?>" class="navbar-item">                                
                                    <?= $value ?>
                                </a>
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
                    <div class="navbar-item">                    

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">                                                           
                                <figure class="image is-32x32">
                                    <? if (strlen(Yii::$app->user->identity->userpic)): ?>
                                        <?= Html::img(Yii::$app->user->identity->userpic, [
                                            'class' => 'is-rounded',
                                        ]) ?>
                                    <? else: ?>
                                        <?= Html::img('web\upload\userpic\default.png', [
                                            'class' => 'is-rounded',
                                        ]) ?>
                                    <? endif ?>
                                </figure> 
                                <span class="column">
                                    <? if (strlen(Yii::$app->user->identity->fname) == 0): ?>
                                        <?= Yii::$app->user->identity->username ?>
                                    <? else: ?>
                                        <?= Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname ?>
                                    <? endif ?>
                                </span>                                
                            </a>                           
                              
                            <div class="navbar-dropdown">
                                <?= Html::a( Yii::t('app\admin', 'Admin panel'), '/admin', ['class' => 'navbar-item has-text-centered']) ?>
                                <?= Html::a( Yii::t('app\admin', 'Account management'), '/cabinet', ['class' => 'navbar-item has-text-centered']) ?>
                                <a class="navbar-item">
                                    <?= Html::beginForm(['/site/logout'], 'post') ?>
                                        <?= Html::submitButton(
                                            Yii::t('app\admin', 'Log out'), [
                                                'class' => 'button is-fullwidth is-text',                                                
                                            ]
                                        ) ?>
                                    <?= Html::endForm() ?>
                                </a>
                            </div>                    
                    </div>
                <? endif ?>
            </div>
        </div>
    </nav>

  <main class="main">        
        
        <?
            if ($alert){
                echo Html::tag('div', Yii::t('app\alert', $alert['content']), ['class' => $alert['class'].' has-text-centered']);
            }
        ?>

        <?= $content ?>
  </div>
</div>

<footer class="footer has-background-grey-light">
  <div class="content has-text-centered">
    <p>
      <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
      <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
      is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
    </p>
    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

    <p class="pull-right"><?= Yii::powered() ?></p>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
