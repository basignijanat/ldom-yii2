<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduForm */

$this->title = Yii::t('app\messages', 'Create Edu Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\messages', 'Edu Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
