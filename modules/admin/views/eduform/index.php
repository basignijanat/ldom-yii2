<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EduFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\messages', 'Edu Forms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\messages', 'Create Edu Form'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'meta_title',
            'meta_description:ntext',
            'name',
            'content:ntext',
            //'language_id',
            //'teacher_ids',
            //'prices',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
