<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ListFormHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'user_id')->dropDownList($users) ?>
	
	<?= $form->field($model, 'eduform_ids')->hiddenInput(['maxlength' => true])->label(false) ?>
	
    <?php 
		echo ListFormHelper::showUpdateList($curriculums, $selectedCurriculums, 'student-eduform_ids', 'eduform_ids', [
			'addButtonName' => Yii::t('app\admin', 'Add'),
			'removeButtonName' => Yii::t('app\admin', 'Remove'),
			'header-level' => 4,
			'header-left' => Yii::t('app\admin', 'All Curriculums'),
			'header-right' => Yii::t('app\admin', 'Selected Curriculums'),
		]);
	?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
