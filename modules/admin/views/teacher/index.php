<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Teacher;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Teachers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app\admin', 'Create Teacher`s Profile'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [                
                'label' => (new Teacher)->attributeLabels()['user_id'],
                'attribute' => 'user_id',
                'content' => function ($model, $key, $index, $column){
                    
                    return User::getUsersData()[$model->user_id];
                },
            ],                     
            'age',
            'experience',
            'education',            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
