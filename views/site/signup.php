<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign up';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="hero is-medium">  
    <div class="hero-body">
        <h1 class="title">
            <?= Html::encode($this->title) ?>
        </h1>
        <h2 class="subtitle">
            Please fill out the following fields to sign up:
        </h2>
        <div class="column is-half">            
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
