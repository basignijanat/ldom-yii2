<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ListFormHelper;

/* @var $this yii\web\View */
/* @var $model app\models\EduForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'language_id')->dropdownList($languages) ?>

    <?= $form->field($model, 'teacher_ids')->hiddenInput(['maxlength' => true]) ?>
	
	<?php 
		echo ListFormHelper::showUpdateList($teachers, $selectedTeachers, 'eduform-teacher_ids', 'teacher_ids', [
			'addButtonName' => Yii::t('app\admin', 'Add'),
			'removeButtonName' => Yii::t('app\admin', 'Remove'),
			'header-level' => 4,
			'header-left' => Yii::t('app\admin', 'All Teachers'),
			'header-right' => Yii::t('app\admin', 'Selected Teachers'),
		]);
	?>
	
    <?= $form->field($model, 'prices')->hiddenInput(['maxlength' => true]) ?>
	
	<?php 
		echo ListFormHelper::showUpdateList($prices, $selectedPrices, 'eduform-prices', 'prices', [
			'addButtonName' => Yii::t('app\admin', 'Add'),
			'removeButtonName' => Yii::t('app\admin', 'Remove'),
			'header-level' => 4,
			'header-left' => Yii::t('app\admin', 'All Prices'),
			'header-right' => Yii::t('app\admin', 'Selected Prices'),
		]);
	?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	

</div>
