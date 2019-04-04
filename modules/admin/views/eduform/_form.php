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

    <?= $form->field($model, 'teacher_ids')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'prices')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<?php ListFormHelper::showUpdateList($teachers, explode(' ', $model->teacher_ids)) ?>

</div>
