<?php

use yii\helpers\Html;

?>

<section class="section has-background-white-bis">
  <? if ($languages): ?>
    <? $is_first = true ?>
    <? $elem_count = 0 ?>

    <h3 class="title">
      <?= $title ?>
    </h3>
    <div class="container">
      <div class="columns">
        <? foreach ($languages as $language): ?>
          <div class="column is-one-quarter">             
            <?= Html::beginTag('a', [
              'href' => '/language/'.$language->url,
              'class' => 'course-link',
            ]) ?>
              <figure class="image is-4by5">
                <?= Html::img($language->image) ?>              
              </figure>        
              <?= Html::tag('div', $language->name, ['class' => 'course-link-title']) ?>
            <?= Html::endTag('a') ?>
          </div>            
          <? $elem_count += 1 ?>
          <? if ($elem_count >= 4): ?>
              </div>
              <? if ($is_first): ?>
                  <div class="level level-item" id="btn-show-languages">
                      <a class="button is-success is-large button-show-more" data-show_more="languages">
                          <?= Yii::t('app\main', 'Show More Languages!') ?>
                      </a>
                  </div>
              <? endif ?>
              <div class="columns is-hidden languages">                

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