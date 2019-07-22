<?php
    use yii\helpers\Html;
?>
<section class="section">
    <div class="container">
        <?= Html::tag('h1', $model->name, [
            'class' => 'title',
        ]) ?>

        <?= Html::tag('span', $model->content) ?>        
        
        <? if (!$is_signed): ?>                
            <div class="section level level-item">            
                <?= Html::a(Yii::t('app\main', 'Sign Up For Free!'), null, [
                    'class' => 'button is-success is-large',
                ]) ?>
            </div>
        <? else: ?>       
            <div class="section">
                <h2 class="is-size-5">
                    <?= Yii::t('app\main', 'Leave Your Comment Here') ?>
                </h2>
                <div class="container">

                </div>
            </div>
        <? endif ?>

        <? if ($comments): ?>
            <div class="section">
                <h2 class="is-size-5">
                    <?= Yii::t('app\admin', 'Comments') ?>
                </h2>
                <div class="container">
                    <? foreach ($comments as $comment): ?>
                        <div class="box">                            
                            <?= $comment->content ?>
                        </div>
                    <? endforeach ?>
                </div>
            </div>
        <? endif ?>

    </div>
</section>
