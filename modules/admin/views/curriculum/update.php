<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Curriculum */

$this->title = Yii::t('app\messages', 'Update Curriculum: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\messages', 'Curriculums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\messages', 'Update');
?>
<div class="curriculum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
