<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
 
<div class="teacher-item">    
    <? echo HtmlPurifier::process($model->name.' (id '.$model->id.')') ?>
</div>