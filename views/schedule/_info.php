<?php

use yii\helpers\Html;

?>

<? foreach($groups as $group): ?>
    <?= Html::beginTag('div', [
        'class' => $group_id == $group->id ? 'columns' : 'columns hidden',
    ]) ?>        
        <div class="column is-two-thirds">        
            <h2 class="is-size-5">
                <?= Yii::t('app\main', 'Schedule for ') ?>
                <?= Html::tag('span', $group->name, [
                    'id' => '',
                ]) ?>
            </h2>
            <hr>
        </div>
        <div class="column is-one-third">
            <h2 class="is-size-5">
                <?= Yii::t('app\main', 'Teachers') ?>
            </h2>
            <div class="">
                <? foreach($group->getTeachers() as $teacher): ?>
                    <?= Html::a($teacher->getFullName(), null, [
                        'class' => 'button is-text',
                    ]) ?>
                <? endforeach ?>
            </div>
            <h2 class="is-size-5">
                <?= Yii::t('app\main', 'Students') ?>
            </h2>
            <div class="">
                <? foreach($group->getStudents() as $student): ?>
                    <?= Html::a($student->getFullName(), null, [
                        'class' => 'button is-text',
                    ]) ?>
                <? endforeach ?>
            </div>
        </div>
    <?= Html::endTag('div') ?>
<? endforeach ?>