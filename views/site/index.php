<?php

use yii\helpers\Html;

$this->title = 'Languagedom';
?>
  <section class="section columns">
    <? if ($languages): ?>
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
    <? endif?>
    
    <!--div class="column is-3">
      <a class="course-link">
        <figure class="image is-4by5">
          <img src="http://www.brainscape.com/blog/wp-content/uploads/2015/06/French.jpg">          
        </figure>
        <div class="course-link-title">French</div>
      </a>
    </div>    
    <div class="column is-3">
      <a class="course-link">
        <figure class="image is-4by5">
          <img src="https://www.downloadwallpapers.info/dl/1600x1200//2016/07/18/97580_background-flag-italy-symbol-texture_1920x1200_h.jpg">          
        </figure>
        <div class="course-link-title">Italian</div>
      </a>
    </div--> 
  </section>

</div>