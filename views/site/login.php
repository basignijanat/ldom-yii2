<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="hero is-medium">  
    <div class="hero-body">
        <h1 class="title">
            <?= Html::encode($this->title) ?>
        </h1>
        <h2 class="subtitle">
            Please fill out the following fields to log in:
        </h2>
        <div class="column is-half">            
            <?= Html::beginForm(null, 'post', ['class' => 'field control']) ?>
                <div class="field control">                                    
                    <?= Html::activeInput('text', $model, 'name', [
                        'class' => 'input is-primary', 
                        'placeholder' => 'Email',
                        'required' => true,
                    ]) ?>                                                        
                </div>
                <div class="field control">                
                    <?= Html::activeInput('password', $model, 'password', [
                        'class' => 'input is-primary', 
                        'placeholder' => 'Password',
                        'required' => true,
                    ]) ?>
                </div>
                <div class="field control">                
                    <?= Html::activeCheckbox($model, 'rememberMe', [
                        'class' => 'checkbox', 
                        'placeholder' => 'Password',
                        'required' => false,
                    ]) ?>
                </div>
                

                <div class="field control">
                    <?= Html::submitButton('Sign up', ['class' => 'button is-primary']) ?>
                </div>
            <?= Html::endForm() ?>
        </div>        
    </div>
  </div>
</section>
