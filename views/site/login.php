<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->name.': '.Yii::t('app\main', 'Log In');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section">  
    <div class="column is-offset-one-quarter is-half has-background-white-ter">
        <h1 class="title">
            <?= Yii::t('app\main', 'Log In') ?>
        </h1>
        <h2 class="subtitle">
            <?= Yii::t('app\main', 'Please fill out the following fields to log in:') ?>
        </h2>
        <div class="column">            
            <?= Html::beginForm(null, 'post', ['class' => 'field control']) ?>
                <div class="field control">                                    
                    <?= Html::activeInput('email', $model, 'name', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Email'),
                        'required' => true,
                    ]) ?>                                                        
                </div>
                <div class="field control">                
                    <?= Html::activeInput('password', $model, 'password', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Password'),
                        'required' => true,
                    ]) ?>
                </div>
                <div class="field control">                
                    <?= Html::activeCheckbox($model, 'rememberMe', [
                        'class' => 'checkbox',                         
                        'required' => false,
                    ]) ?>
                </div>                

                <div class="field control">
                    <?= Html::submitButton(Yii::t('app\main', 'Log In'), [
                        'class' => 'button is-primary',
                        'name' => 'login',
                    ]) ?>
                </div>
            <?= Html::endForm() ?>
        </div>        
    </div>
  </div>
</section>
