<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = Yii::t('app\admin', 'Create Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app\admin', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'teachers' => $teachers,
        'selectedTeachers' => $selectedTeachers,
        'students' => $students,
        'selectedStudents' => $selectedStudents,
    ]) ?>

</div>
