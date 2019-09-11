<?
use yii\helpers\Html;
?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="/" class="h3" style="display: block">
                    <?= Yii::t('app\admin', 'Home') ?>
                </a>
                <a href="/site/signup" class="footer-link">
                    <?= Yii::t('app\admin', 'Sign up') ?>
                </a>
                <a href="/site/login" class="footer-link">
                    <?= Yii::t('app\admin', 'Log in') ?>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/site/contact" class="h3" style="display: block">
                    <?= Yii::t('app\admin', 'Contact') ?>
                </a>
                <?= Html::a(Yii::t('app\admin', $phone), 'tel:'.$phone, [
                    'class' => 'footer-link',                    
                ]) ?>
                <?= Html::a(Yii::t('app\admin', $email), 'mailto:'.$email, [
                    'class' => 'footer-link',                    
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= Html::a( Yii::t('app\main', 'Account Management'), '/cabinet', [
                    'class' => 'h3',
                    'style' => 'display: block',
                ]) ?>
                <a href="/schedule" class="footer-link">
                    <?= Yii::t('app\main', 'My Schedule') ?>
                </a>
            </div>            
        </div>        
    </div>  
    <div class="container">        
        <p class="pull-left">&copy; My Company <!?= date('Y') ?></p>
        <p class="pull-right" class="has-text-white"><!?= Yii::powered() ?></p>    
    </div>
</footer>