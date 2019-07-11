<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Price */

$this->title = Yii::t('app\admin', 'Update Price: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\admin', 'Update');
?>
<div class="white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
