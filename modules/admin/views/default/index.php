<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Admin Panel');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>
    
	<table class="table table-striped table-bordered">        
        <thead>
            <th>
                <?= Yii::t('app\admin', 'Date') ?>
            </th>
            <th>
                <?= Yii::t('app\admin', 'Day of The Week') ?>
            </th>
            <th>
                <?= Yii::t('app\admin', 'Student Count') ?>
            </th>
        </thead>
        <tbody>
            <? foreach ($statistics as $item): ?>
                <tr>
                    <td>
                        <?= $item['date'] ?>
                    </td>
                    <td>
                        <?= Yii::t('app\main', $item['day_of_week']) ?>
                    </td>
                    <td>
                        <? if ($item['student_count']): ?>
                            <span style="color: green;">
                        <? else: ?>
                            <span style="">
                        <? endif ?>
                            <?= '+'.$item['student_count'] ?>
                        </span>                        
                    </td>
                </tr>
            <? endforeach ?>
            <tr>
                <td colspan="2">
                    <?= Yii::t('app\admin', 'Total Students:') ?>                
                </td>
                <td>
                    <span style="color: blue;">
                        <?= $total_students ?>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
