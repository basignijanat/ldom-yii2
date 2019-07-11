<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = Yii::t('app\messages', 'Create Faq');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\messages', 'Faqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'curriculums' => $curriculums,
    ]) ?>

</div>
