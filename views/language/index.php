<?php
    use yii\helpers\Html;

$this->title = Yii::$app->name.': '.Yii::t('app\main', $model->name);
?>
<section class="section has-background-grey-lighter">
    <div class="container">
        <?= Html::tag('h1', $model->name, [
            'class' => 'title',
        ]) ?>

        <?= Html::tag('span', $model->content) ?>        
        
    </div>
</section>
        <? if (!$user_groups): ?>                
            <div class="section has-background-white-bis level level-item">            
                <?= Html::a(Yii::t('app\main', 'Sign Up For Free!'), null, [
                    'class' => 'button is-success is-large',
                ]) ?>
            </div>
        <? else: ?>       
            <div class="section has-background-white-bis">                
                <div class="container">                    
                    <?= Html::beginForm(null, 'post', [
                        'class' => 'field control',
                        'data-pjax' => '1',
                    ]) ?>                        
                        <div class="field control"> 
                            <?= Html::activeHiddenInput($new_comment, 'student_id') ?>    

                            <?= Html::activeHiddenInput($new_comment, 'language_id') ?>                 

                            <?= Html::activeTextarea($new_comment, 'content', [
                                'class' => 'textarea is-primary', 
                                'placeholder' => Yii::t('app\main', 'Leave Your Comment Here'),
                                'required' => true,
                                'rows' => '6',
                                'cols' => '10',
                            ]) ?>                            
                        </div>                                    

                        <div class="field control">
                            <?= Html::submitButton(Yii::t('app\main', 'Submit'), [
                                'class' => 'button is-info',                                
                            ]) ?>
                        </div>
                    <?= Html::endForm() ?>                    
                </div>
            </div>
        <? endif ?>

        <? if ($comments): ?>
            <div class="section has-background-white-ter">                
                <div class="container owl-carousel owl-theme">
                    <? foreach ($comments as $comment): ?>
                        <? $user = $comment->getStudent()->getUser() ?>
                        <div class="box carousel-box">
                            <div class="column is-half is-offset-one-quarter">
                                <div class="image is-square is-128x128">
                                    <? if (strlen($user->userpic)): ?>                                        
                                        <?= Html::img($user->userpic, [
                                            'class' => 'is-rounded',
                                        ]) ?>                                
                                    <? else: ?>
                                        <?= Html::img('/web/upload/userpic/default.png', [
                                            'class' => 'is-rounded',
                                        ]) ?>
                                    <? endif ?>
                                </div>
                            </div>
                            <h3 class="is-size-6 has-text-centered comment-header">
                                <?= $user->getFullName() ?>
                            </h3>
                            <div>                            
                                <?= $comment->content ?>
                            </div>
                        </div>
                    <? endforeach ?>                    
                </div>
            </div>
        <? endif ?>
