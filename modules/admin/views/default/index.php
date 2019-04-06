<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Administrator');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <ul>
		<li><a href="/admin/language"><h2><?php echo Yii::t('app\admin', 'Languages') ?></h2></a>
		<li><a href="/admin/eduform"><h2><?php echo Yii::t('app\admin', 'Teaching Methods') ?></h2></a>
		<li><a href="/admin/userlang"><h2><?php echo Yii::t('app\admin', 'User Languages') ?></h2></a>
		<li><a href="/admin/teacher"><h2><?php echo Yii::t('app\admin', 'Teachers') ?></h2></a>
	</ul>
</div>
