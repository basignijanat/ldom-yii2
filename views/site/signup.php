<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->name.': '.Yii::t('app\main', 'Sign Up');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="section">  
    <div class="column is-offset-one-quarter is-half has-background-white-ter">
        <h1 class="title">
            <?= Yii::t('app\main', 'Sign Up') ?>
        </h1>
        <h2 class="subtitle">
            <?= Yii::t('app\main', 'Please fill out the following fields to sign up:') ?>
        </h2>
        <div class="column">            
            <?= Html::beginForm(null, 'post', [
                'class' => 'field control',
                'enctype' => 'multipart/form-data',
            ]) ?>
                <div class="field control">                                    
                    <?= Html::activeInput('email', $model, 'username', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Email'),
                        'required' => true,
                    ]) ?>                                                        
                </div>
                <div class="field control">                
                    <?= Html::activeInput('password', $model, 'password_new', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Password'),
                        'required' => true,
                    ]) ?>
                </div>
                <div class="field control">                
                    <?= Html::activeInput('password', $model, 'password_repeat', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Repeat Password'),
                        'required' => true,
                    ]) ?>
                </div>
                <hr>
                <div class="field control">                
                    <?= Html::activeInput('text', $model, 'fname', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'First Name'),
                    ]) ?>                
                </div>
                <div class="field control">                
                    <?= Html::activeInput('text', $model, 'mname', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Middle Name'),
                    ]) ?>                
                </div>
                <div class="field control">                
                    <?= Html::activeInput('text', $model, 'lname', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Last Name'),
                    ]) ?>                
                </div>
                <hr>
                <div class="field control file has-name is-info">                
                    <label class="file-label">
                        <?= Html::activeFileInput($model, 'image_file', [
                            'class' => 'file-input',
                            'accept' => 'image/jpeg,image/png'
                        ]) ?>                
                        <span class="file-cta">
                            <?= Html::tag('span', Yii::t('app\admin', 'Choose a file'), [
                                'class' => 'file-label'
                            ]) ?>                                
                        </span>
                        <span class="file-name" id="userpic-file-name"></span>
                    </label>                    
                </div>

                <div class="field control">
                    <?= Html::submitButton(Yii::t('app\main', 'Sign Up'), [
                        'class' => 'button is-primary', 
                        'name' => 'signup',
                    ]) ?>
                </div>
            <?= Html::endForm() ?>
        </div>        
    </div>
  </div>
</section>
