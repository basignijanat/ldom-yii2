<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userlang */

$this->title = Yii::t('app\admin', 'Create Userlang');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Userlangs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userlang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
