<?php

use yii\helpers\Html;

?>

<? if ($all_groups): ?>
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
            <? if ($current_group): ?>
                <div class="columns">        
                    <div class="column is-two-thirds">        
                        <h2 class="is-size-5">
                            <?= Yii::t('app\main', 'Schedule for ') ?>
                            <?= Html::tag('span', $current_group->name, [
                                'id' => '',
                            ]) ?>
                        </h2>                                                
                        <? $current_date = false ?>
                        <? foreach ($lessons as $lesson): ?>
                            <? if (date('d-m-Y', $lesson->time) != $current_date): ?>
                                <? $current_date = date('d-m-Y', $lesson->time) ?>
                                <hr>
                                <div class="columns">
                                    <div class="column is-half">
                                        <span>
                                            <?= Yii::t('app\main', date('l', $lesson->time)).', ' ?>
                                            <?= date('d-m-Y', $lesson->time) ?>
                                        </span>
                                    </div>
                                    <div class="column is-half">
                                        <span>
                                            <?= date('H:i - ', $lesson->time) ?>
                                            <?= date('H:i', $lesson->time + 60 * 60) ?>
                                        </span>
                                    </div>                               
                                </div>
                            <? else: ?>
                                <div class="columns">                                    
                                    <div class="column is-half is-offset-half">
                                        <span>
                                            <?= date('H:i - ', $lesson->time) ?>
                                            <?= date('H:i', $lesson->time + 60 * 60) ?>
                                        </span>
                                    </div>                               
                                </div>
                            <? endif ?>
                        <? endforeach ?>
                    </div>
                    <div class="column is-one-third">
                        <h2 class="is-size-5">
                            <?= Yii::t('app\admin', 'Teachers') ?>
                        </h2>
                        <div class="">
                            <? foreach($current_group->getTeachers() as $teacher): ?>
                                <?= Html::a($teacher->getFullName(), null, [
                                    'class' => 'button is-text',
                                ]) ?>
                            <? endforeach ?>
                        </div>
                        <h2 class="is-size-5">
                            <?= Yii::t('app\admin', 'Students') ?>
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
            <? else:?>
                <div class="has-text-centered">
                    <?= Yii::t('app\main', 'No Group Data Available')?>
                </div>
            <? endif ?>
        <div>
    </section>
<? endif ?>
