<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lesson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map($groups, 'id', 'name')) ?>    
    
    <div class="form-group">
        <?= Html::label(Yii::t('app\admin', 'Date'), 'lesson-date_raw', [
            'class' => 'control-label',
        ]) ?>
        <input type="date" id="lesson-date_raw" name="Lesson[date_raw]" value="<?= date('Y-m-d', $model->time) ?>" class ="form-control" required>        
    </div>
    <div class="form-group">
        <?= Html::label(Yii::t('app\admin', 'Time'), 'lesson-date_raw', [
            'class' => 'control-label',
        ]) ?>        
        <input type="time" id="lesson-time_raw" name="Lesson[time_raw]" value="<?= date('H:i', $model->time) ?>" class ="form-control" required>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
