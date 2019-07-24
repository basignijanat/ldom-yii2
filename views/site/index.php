<?php

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>
  <section class="section has-background-white-bis">
    <? if ($languages): ?>
      <h3 class="title">
        <?= Yii::t('app\main', 'Popular Languages') ?>
      </h3>
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
        <? endforeach ?>
      </div>
    <? endif?>    
    
  </section>

</div>