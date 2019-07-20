<?php

use yii\helpers\Html;

?>

<?= Html::beginForm('/cabinet/edit', 'post', [
    'class' => 'field control',                    
]) ?>
    <? if ($property['name'] != 'username'): ?>
        <?= Html::activeHiddenInput($user, 'username') ?>
    <? endif ?>

    <div class="columns">            
        <div class="column is-one-quarter">
            <?= Html::tag('h2', Yii::t('app\admin', $property['title']), [
                'class' => 'is-size-5',
            ]) ?>
        </div>            
        <div class="column is-half" id="div-show-<?= $property['name'] ?>">
            <?= Html::tag('span', Html::encode($property['value']), [                        
                'class' => 'is-size-5',
            ]) ?>            
        </div>
        <div class="column" id="btn-edit-<?= $property['name'] ?>">
            <?= Html::button(Yii::t('app\main', 'Edit'), [
                'class' => 'button is-info edit',
                'data-user_property' => $property['name'],                
            ]) ?>            
        </div>
        <div class="column is-half edit-user-property" id="div-edit-<?= $property['name'] ?>">                        
            <? if ($property['name'] == 'password_new'): ?>
                <?= Html::activeInput('password', $user, 'password_new', [
                    'class' => 'input is-info',
                    'style' => 'margin-bottom: 5px;',
                    'placeholder' => Yii::t('app\admin', 'Password'),
                ]) ?>            
                <?= Html::activeInput('password', $user, 'password_repeat', [
                    'class' => 'input is-info',
                    'placeholder' => Yii::t('app\admin', 'Repeat Password'),
                ]) ?>
            <? else: ?>
                <?= Html::activeInput('text', $user, $property['name'], [
                    'class' => 'input is-info',
                ]) ?>  
            <? endif ?>
        </div>   
        <div class="column edit-user-property" id="cancel-edit-<?= $property['name'] ?>">
            <?= Html::button(Yii::t('app\main', 'Cancel'), [
                'class' => 'button is-warning cancel',
                'data-user_property' => $property['name'],                
            ]) ?>                        
            <?= Html::submitButton(Yii::t('app\main', 'Save'), [
                'class' => 'button is-success',                
            ]) ?> 
        </div>                
    </div>
<?= Html::endForm() ?> 