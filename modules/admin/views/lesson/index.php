<?php

use app\models\Lesson;
use app\models\Group;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Lessons');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\admin', 'Create Lesson'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',            
            [
                'label' => (new Lesson)->attributeLabels()['group_id'],
                'attribute' => 'group_id',
                'content' => function ($model, $key, $index, $column){
                    
                    return ArrayHelper::map(Group::getGroups(), 'id', 'name')[$model->group_id];
                },
            ],
            [
                'label' => (new Lesson)->attributeLabels()['time'], 
                'attribute' => 'time',               
                'content' => function ($model, $key, $index, $column){
                    
                    return date('d-m-Y H:i', $model->time);
                },
            ],            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
