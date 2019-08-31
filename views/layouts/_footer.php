<?
use yii\helpers\Html;
?>

<footer class="footer has-background-grey has-text-white-ter">
    <div class="columns">
        <div class="column is-one-quarter">
            <a href="/" class="has-text-white is-size-3" style="display: block">
                <?= Yii::t('app\admin', 'Home') ?>
            </a>
            <a href="/site/signup" class="has-text-white" style="display: block">
                <?= Yii::t('app\admin', 'Sign up') ?>
            </a>
            <a href="/site/login" class="has-text-white" style="display: block">
                <?= Yii::t('app\admin', 'Log in') ?>
            </a>
        </div>
        <div class="column is-one-quarter">
            <a href="/site/contact" class="has-text-white is-size-3" style="display: block">
                <?= Yii::t('app\admin', 'Contact') ?>
            </a>
            <?= Html::a(Yii::t('app\admin', $phone), 'tel:'.$phone, [
                'class' => 'has-text-white',
                'style' => 'display: block',
            ]) ?>
            <?= Html::a(Yii::t('app\admin', $email), 'mailto:'.$email, [
                'class' => 'has-text-white',
                'style' => 'display: block',
            ]) ?>
        </div>
        <div class="column is-half">
            <?= Html::a( Yii::t('app\main', 'Account Management'), '/cabinet', [
                'class' => 'has-text-white is-size-3',
                'style' => 'display: block',
            ]) ?>
            <a href="/schedule" class="has-text-white" style="display: block" >
                <?= Yii::t('app\main', 'My Schedule') ?>
            </a>
        </div>
    </div>
  <div class="columns">        
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right" class="has-text-white"><?= Yii::powered() ?></p>    
  </div>
</footer>