<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduForm */

$this->title = Yii::t('app\messages', 'Update Edu Form: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\messages', 'Edu Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\messages', 'Update');
?>
<div class="edu-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
