<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CurriculumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\messages', 'Curriculums');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curriculum-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\messages', 'Create Curriculum'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'content',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
