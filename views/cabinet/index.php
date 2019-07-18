<?

use yii\helpers\Html;

?>

<div class="section">
    <div class="container">
        <?= Html::tag('h1', Yii::t('app\main', 'My Cabinet'), ['class' => 'title']) ?>        
        
        <div class="columns">            
                <div class="column is-one-quarter">
                    <?= Html::tag('h2', Yii::t('app\admin', 'Email'), ['class' => 'is-size-5']) ?>
                </div>            
                <div class="column is-one-quarter" id="div-show-username">
                    <?= Html::tag('span', Html::encode($user->username), [                        
                        'class' => 'is-size-5',
                    ]) ?>            
                </div>
                <div class="column" id="btn-edit-username">
                    <?= Html::button(Yii::t('app\main', 'Edit'), [
                        'class' => 'button is-info edit',
                        'data-user_property' => 'username',
                    ]) ?>            
                </div>
                <div class="column">
                    <?= Html::beginForm('/cabinet/username', 'post', [
                        'class' => 'field control',                    
                    ]) ?>

                    <?= Html::endForm() ?>
                </div>            
        </div>
        <div class="columns">
            <div class="column is-one-quarter">
                <?= Html::tag('h2', Yii::t('app\admin', 'Password'), ['class' => 'is-size-5']) ?>
            </div>            
            <div class="column is-one-quarter">
                <?= Html::tag('span', '**********', ['class' => 'is-size-5']) ?>            
            </div>
            <div class="column">
                <?= Html::button(Yii::t('app\main', 'Edit'), ['class' => 'button is-info']) ?>            
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column is-one-quarter">
                <?= Html::tag('h2', Yii::t('app\admin', 'First Name'), ['class' => 'is-size-5']) ?>
            </div>            
            <div class="column is-one-quarter">
                <?= Html::tag('span', Html::encode($user->fname), ['class' => 'is-size-5']) ?>            
            </div>
            <div class="column">
                <?= Html::button(Yii::t('app\main', 'Edit'), ['class' => 'button is-info']) ?>            
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-quarter">
                <?= Html::tag('h2', Yii::t('app\admin', 'Middle Name'), ['class' => 'is-size-5']) ?>
            </div>            
            <div class="column is-one-quarter">
                <?= Html::tag('span', Html::encode($user->mname), ['class' => 'is-size-5']) ?>            
            </div>
            <div class="column">
                <?= Html::button(Yii::t('app\main', 'Edit'), ['class' => 'button is-info']) ?>            
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-quarter">
                <?= Html::tag('h2', Yii::t('app\admin', 'Last Name'), ['class' => 'is-size-5']) ?>
            </div>            
            <div class="column is-one-quarter">
                <?= Html::tag('span', Html::encode($user->lname), ['class' => 'is-size-5']) ?>            
            </div>
            <div class="column">
                <?= Html::button(Yii::t('app\main', 'Edit'), ['class' => 'button is-info']) ?>            
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column is-half">
                <?= Html::beginForm('/cabinet/userpic', 'post', [
                    'class' => 'field control',
                    'enctype' => 'multipart/form-data',
                ]) ?>
                    <?= Html::activeHiddenInput($user, 'username') ?>
                    <div class="field control file has-name is-info">                                    
                        <label class="file-label">
                            <?= Html::activeFileInput($user, 'image_file', [
                                'class' => 'file-input',
                                'accept' => 'image/jpeg,image/png'
                            ]) ?>                
                            <span class="file-cta">
                                <?= Html::tag('span', Yii::t('app\admin', 'Choose a file'), ['class' => 'file-label']) ?>                                
                            </span>
                            <span class="file-name" id="userpic-file-name"></span>
                        </label>                                    
                    </div>
                    <div class="field control">
                        <?= Html::submitButton(Yii::t('app\main', 'Load Image'), [
                            'class' => 'button is-primary',                             
                        ]) ?>
                    </div>
                <?= Html::endForm() ?>
            </div>
            <div class="column">
                <? if ($user->userpic): ?>                
                    <?= Html::img($user->userpic, [
                        'width' => '150px', 
                        'alt' => 'Userpic'
                    ]) ?>		            
                <? else: ?>
                    <?= Html::tag('span', null, []) ?>                
                <? endif ?>
            </div>
        </div>
    </div>
</div>