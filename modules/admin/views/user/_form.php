<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'isadmin')->dropDownList([0 => Yii::t('app\admin', 'No'), 1 => Yii::t('app\admin', 'Yes')]) ?>
	
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'password_new')->passwordInput() ?>

	<?= $form->field($model, 'password_repeat')->passwordInput() ?>
	
	<?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'image_file')->fileInput(['accept=' => 'image/gif,image/jpeg,image/png,']) ?>
	
	<? if ($model->userpic): ?>
		<div class="form-group">
			<?= Html::img($model->userpic, ['width' => '150px', 'alt' => 'Userpic']) ?>		
		</div>
	<? endif ?>	

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
