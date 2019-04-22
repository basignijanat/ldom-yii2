<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'isadmin')->textInput() ?>
	
	<?= $form->field($model, 'teacher_id')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?
		if (strlen($model->password) > 0)
		{
			echo $form->field($model, 'password')->hiddenInput()->label(false);
			echo $form->field($model, 'password_new')->passwordInput();
		}
		else
		{
			echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
		}
	?>

    <?= $form->field($model, 'userpic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
