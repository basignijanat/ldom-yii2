<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Group;
use app\models\Language;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\admin', 'Create Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',            
            [
                'label' => (new Group)->attributeLabels()['language_id'],
                'attribute' => 'language_id',
                'content' => function ($model, $key, $index, $column){
                    
                    return Language::getLanguages()[$model->language_id];
                },
            ],
            //'student_ids',
            //'teacher_ids',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
