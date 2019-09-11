<?php

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>

<?= $this->render('_languages', [
    'languages' => $languages,
    'title' => Yii::t('app\main', 'Popular Languages'),
])?>

<? if ($teachers): ?>  
  <div class="container">                
    <h3 class="page-header">
      <?= Yii::t('app\main', 'Our Teachers') ?>
    </h3>
      <div class="container owl-carousel owl-theme">
          <? foreach ($teachers as $teacher): ?>
              <? $user = $teacher->getUser() ?>
              <div class="box carousel-box">
                  <div class="col-md-12">
                      <div class="">
                          <? if (strlen($user->userpic)): ?>                                        
                              <?= Html::img($user->userpic, [
                                  'class' => 'is-rounded',
                              ]) ?>                                
                          <? else: ?>
                              <?= Html::img('/web/upload/userpic/default.png', [
                                  'class' => 'is-rounded',
                              ]) ?>
                          <? endif ?>
                      </div>
                  </div>
                  <h3 class="is-size-4">
                      <?= $user->getShortName() ?>
                  </h3>
                  <div>
                      <?= Yii::t('app\admin', 'Age').': ' ?>
                      <b>                            
                        <?= $teacher->age ?>                        
                      </b>
                  </div>  
                  <div>
                      <?= Yii::t('app\admin', 'Education').': ' ?> 
                      <b>                           
                        <?= $teacher->education ?>   
                      </b>                   
                  </div>  
                  <div>
                      <?= Yii::t('app\admin', 'Experience').': ' ?>
                      <b>                            
                        <?= $teacher->experience ?>                        
                      </b>
                  </div>                
              </div>
          <? endforeach ?>                    
        </div>
    </div>
<? endif ?>