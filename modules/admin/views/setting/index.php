<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app\admin', 'Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Administrator'), 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-box">

    <h1><?= Html::encode($this->title) ?></h1>

    <? foreach ($settings as $model): ?>

        <div class="form-group">
            <?= Html::beginForm('/admin/setting/'.$model->id) ?>               
                
                <?= Html::activeHiddenInput($model, 'name', [
                    'id' => 'setting-name-raw-'.$model->id,
                ]) ?>
                <?= Html::activeHiddenInput($model, 'value', [
                    'disabled' => true,
                    'id' => 'setting-value-raw-'.$model->id,
                ]) ?>
                
                <?= Html::label(Yii::t('app\admin', $model->name), 'Setting[value]', [
                    'class' => 'setting-label',                    
                ]) ?>
                <?= Html::activeInput('text', $model, 'value', [
                    'class' => 'form-control setting-form',
                    'id' => 'setting-value-'.$model->id,
                ]) ?>                
                               
                <?= Html::button(Yii::t('app\admin', 'Reset'), [
                    'class' => 'btn btn-warning reset',
                    'data-setting_id' => $model->id,
                ]) ?>
                <?= Html::submitButton(Yii::t('app\admin', 'Save'), ['class' => 'btn btn-success']) ?>                

            <?= Html::endForm() ?>
        </div>

    <? endforeach ?>

</div>