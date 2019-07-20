<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ListFormHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language_id')->dropdownList($languages) ?>

    <?= $form->field($model, 'teacher_ids')->hiddenInput(['id' => 'hidden-teacher_ids'])->label(false) ?>

    <?= ListFormHelper::showUpdateList($teachers, $selectedTeachers, 'hidden-teacher_ids', 'teacher_ids', [
		'addButtonName' => Yii::t('app\admin', 'Add'),
		'removeButtonName' => Yii::t('app\admin', 'Remove'),		
		'header-left' => Yii::t('app\admin', 'All Teachers'),
		'header-right' => Yii::t('app\admin', 'Selected Teachers'),
	]) ?>

    <?= $form->field($model, 'student_ids')->hiddenInput(['id' => 'hidden-student_ids'])->label(false) ?>

    <?= ListFormHelper::showUpdateList($students, $selectedStudents, 'hidden-student_ids', 'student_ids', [
		'addButtonName' => Yii::t('app\admin', 'Add'),
		'removeButtonName' => Yii::t('app\admin', 'Remove'),		
		'header-left' => Yii::t('app\admin', 'All Students'),
		'header-right' => Yii::t('app\admin', 'Selected Students'),
	]) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
