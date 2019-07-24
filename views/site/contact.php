<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::$app->name.': '.Yii::t('app\main', 'Contact');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="section">
<div class="container column is-half is-offset-one-quarter has-background-white-ter">
    <h1 class="title">
        <?= Yii::t('app\admin', 'Contact') ?>
    </h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p class="subtitle">
        <?= Yii::t('app\main', 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') ?>
        </p>

        <div class="row">
            <div class="col-lg-5">

            <?= Html::beginForm(null, 'post', [
                'class' => 'field control',
                'enctype' => 'multipart/form-data',
            ]) ?>
                <div class="field control">
                    <?= Html::activeInput('text', $model, 'name', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Name'),
                        'required' => true,
                    ]) ?>                                                        
                </div>
                <div class="field control">
                    <?= Html::activeInput('email', $model, 'email', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\admin', 'Email'),
                        'required' => true,
                    ]) ?>                                                        
                </div>
                <div class="field control">
                    <?= Html::activeInput('text', $model, 'subject', [
                        'class' => 'input is-primary', 
                        'placeholder' => Yii::t('app\main', 'Subject'),
                        'required' => true,
                    ]) ?>                                                        
                </div>
                <div class="field control">
                    <?= Html::activeTextarea($model, 'body', [
                        'class' => 'textarea is-primary', 
                        'placeholder' => Yii::t('app\main', 'Body'),
                        'required' => true,
                        'rows' => 6
                    ]) ?>                                                        
                </div>
                <div class="field control">
                    <?= Html::submitButton(Yii::t('app\main', 'Submit'), [
                        'class' => 'button is-primary', 
                        'name' => 'contact-button',
                    ]) ?>
                </div>                    

                    <!--?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?-->                    
                <?= Html::endForm() ?>

            </div>
        </div>

    <?php endif; ?>
</div>
</section>
