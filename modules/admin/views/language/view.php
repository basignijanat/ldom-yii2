<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="language-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app\admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app\admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'userlang_id',
            'meta_title',
            'meta_description:ntext',
            'name',
            'content:ntext',
        ],
    ]) ?>

</div>
