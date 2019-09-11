<?php

use yii\helpers\Html;

?>

<section class="container">
  <? if ($languages): ?>
    <? $is_first = true ?>
    <? $elem_count = 0 ?>

    <h3 class="page-header">
      <?= $title ?>
    </h3>
    <div class="container">
      <div class="row">
        <? foreach ($languages as $language): ?>
          <div class="col-md-3 col-sm-3">             
            <?= Html::beginTag('a', [
              'href' => '/language/'.$language->url,
              'class' => 'course-link',
            ]) ?>
              <?= Html::img($language->image, [
                'class' => 'course-image',
              ]) ?>        
              <?= Html::tag('div', $language->name, ['class' => 'course-link-title']) ?>
            <?= Html::endTag('a') ?>
          </div>            
          <? $elem_count += 1 ?>
          <? if ($elem_count >= 4): ?>
              </div>
              <? if ($is_first): ?>
                  <div class="level level-item" id="btn-show-languages">
                      <a class="btn btn-success button-show-more" data-show_more="languages">
                          <?= Yii::t('app\main', 'Show More Languages!') ?>
                      </a>
                  </div>
              <? endif ?>
              <div class="row hidden languages">                

              <? $elem_count = 0 ?>
              <? $is_first = false ?>
          <? endif ?>
        <? endforeach ?>
      </div>
    </div>
  <? else: ?>
    <h3 class="title">
      <?= Yii::t('app\main', 'Nothing Is Found!') ?>
    </h3>
  <? endif?>  
</section>