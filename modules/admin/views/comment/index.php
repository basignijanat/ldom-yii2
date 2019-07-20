<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Student;
use app\models\Language;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Comments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\admin', 'Create Comment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'student_id',
            [                
                'label' => (new Student)->attributeLabels()['student_id'],
                'attribute' => 'student_id',
                'content' => function ($model, $key, $index, $column){
                    
                    return Student::getStudents()[$model->student_id];                    
                },
            ],              
            [
                'label' => (new Student)->attributeLabels()['language_id'],
                'attribute' => 'language_id',
                'content' => function ($model, $key, $index, $column){
                    
                    return Language::getLanguages()[$model->language_id];
                },
            ],
            'content',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
