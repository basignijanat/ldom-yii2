<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput(['accept=' => 'image/jpeg,image/png,']) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
