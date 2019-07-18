<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\helpers\Url;

use app\models\Userlang;
use app\models\AlertData;

AdminAsset::register($this);

$languages = UserLang::GetMenuLanguages();
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
<?php $this->beginBody() ?>
<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="/admin">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?=Yii::$app->params['adminimage']?>/adminassets/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="<?=Yii::$app->params['adminimage']?>/adminassets/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="<?=Yii::$app->params['adminimage']?>/adminassets/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="<?=Yii::$app->params['adminimage']?>/adminassets/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <ul class="nav navbar-top-links navbar-left">
                    <li>
                        <?= Html::a(Yii::t('app\admin', 'Home'), '/') ?>
                    </li>                    
                        <? foreach ($languages as $key => $value): ?>
                            <li>                            
                                <?= Html::a($value, '?lang='.$key, [
                                    'class' => Yii::$app->language == $key ? 'language-selected' : '',
                                ]) ?>
                            </li>
                        <? endforeach ?>                                           
                </ul>                
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right">                                          
                    <li>
                        <a class="profile-pic" href="/cabinet">
                            <? if (strlen(Yii::$app->user->identity->userpic)): ?>
                                <?= Html::img(Yii::$app->user->identity->userpic, [
                                    'alt' => 'user-img', 
                                    'width' => '36',
                                    'class' => 'img-circle'
                                ]) ?>
                            <? else: ?>
                                <?= Html::img('\web\upload\userpic\default.png', [
                                    'alt' => 'user-img', 
                                    'width' => '36',
                                    'class' => 'img-circle'
                                ]) ?>
                            <? endif ?>
                            <b class="hidden-xs">
                                <?
                                    if (strlen(Yii::$app->user->identity->fname) == 0){
                                        echo Yii::$app->user->identity->username;
                                    }
                                    else{
                                        echo Yii::$app->user->identity->fname.' '.Yii::$app->user->identity->lname;
                                    }
                                ?>
                            </b>
                        </a>
                    </li>                    
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?=Url::to(['/'])?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>На главную</a>
                    </li>                         
                    <li>
                        <a href="<?=Url::to(['/admin/ulang'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'User Languages') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/language'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Languages') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/eduform'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Teaching Methods') ?></a>
                    </li>                    
                    <li>
                        <a href="<?=Url::to(['/admin/user'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Users') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/teacher'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Teachers') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/student'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Students') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/comment'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Comments') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/price'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Prices') ?></a>
                    </li>
                    <li>
                        <a href="<?=Url::to(['/admin/faq'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'FAQ') ?></a>
                    </li>                    
                    <li>
                        <a href="<?=Url::to(['/admin/setting'])?>" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><?= Yii::t('app\admin', 'Settings') ?></a>
                    </li>  
                </ul>
               
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!--div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <?= Html::tag('h4', Yii::t('app\admin', 'Dashboard'), ['class' => 'page-title']) ?>
                    </div>                                        
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <?
                    if ($alert){
                        echo Html::tag('div', Yii::t('app\alert', $alert['content']), ['class' => $alert['class'].' row bg-title']);
                    }
                ?>
                
                <?=$content?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
