<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Price */

$this->title = Yii::t('app\messages', 'Create Price');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\messages', 'Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
