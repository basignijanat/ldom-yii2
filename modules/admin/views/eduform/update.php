<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduForm */

$this->title = Yii::t('app\admin', 'Update Teaching Method: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Teaching Methods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app\admin', 'Update');
?>
<div class="edu-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'languages' => $languages,
    ]) ?>

</div>
