<?php

use yii\helpers\Html;

?>

<section class="section has-background-light">
    <h1 class="title">
        <?= Yii::t('app\main', 'My Schedule') ?>
    </h2>    
    <div class="container">
        <div class="columns">        
            <? foreach($all_groups as $key => $groups): ?>
                <div class="column">
                    <?= $this->render('_groups', [
                        'groups' => $groups,
                        'role' => $key,
                        'group_id' => $group_id,
                    ]) ?>
                </div>
            <? endforeach ?>  
        </div>
    </div>
</section>        
<section class="section">
    <div class="container">
        <div class="columns">        
            <div class="column is-two-thirds">        
                <h2 class="is-size-5">
                    <?= Yii::t('app\main', 'Schedule for ') ?>
                    <?= Html::tag('span', $current_group->name, [
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
                    <? foreach($current_group->getTeachers() as $teacher): ?>
                        <?= Html::a($teacher->getFullName(), null, [
                            'class' => 'button is-text',
                        ]) ?>
                    <? endforeach ?>
                </div>
                <h2 class="is-size-5">
                    <?= Yii::t('app\main', 'Students') ?>
                </h2>
                <div class="">
                    <? foreach($current_group->getStudents() as $student): ?>
                        <?= Html::a($student->getFullName(), null, [
                            'class' => 'button is-text',
                        ]) ?>
                    <? endforeach ?>
                </div>
            </div>
        </div>
    <div>
</section>
