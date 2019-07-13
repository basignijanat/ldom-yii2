<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alert */

$this->title = Yii::t('app\admin', 'Update Alert: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Alerts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\admin', 'Update');
?>
<div class="alert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
