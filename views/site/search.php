<?php

use yii\helpers\Html;

$this->title = Yii::$app->name.': '.Yii::t('app\main', 'Search Result');
?>

<?= $this->render('_languages', [
    'languages' => $languages,
    'title' => Yii::t('app\main', 'Search Result'),
])?>