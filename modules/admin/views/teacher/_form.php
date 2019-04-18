<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'experience')->textInput() ?>

    <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

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

	<?= $form->field($model, 'image')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'image_file')->fileInput(['accept=' => 'image/jpeg,image/png,']) ?>
	
	<? 
		if ($model->image)
		{
			echo Html::img('/web/'.$model->image, ['width' => '150px', 'alt' => 'Userpic']);
		}
	?>	

    <?= $form->field($model, 'eduprogram_ids')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
