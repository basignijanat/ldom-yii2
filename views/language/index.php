<?php
    use yii\helpers\Html;
?>
<section class="section">
    <div class="container">
        <?= Html::tag('h1', $model->name, [
            'class' => 'title',
        ]) ?>

        <?= Html::tag('span', $model->content) ?>
        
        <div class="section level level-item">
            <?if ($is_signed): ?>
                
            <? else: ?>
                <?= Html::a(Yii::t('app\main', 'Sign Up For Free!'), null, [
                    'class' => 'button is-success is-large',
                ]) ?>
            <? endif ?>
        </div>
    </div>
</section>
