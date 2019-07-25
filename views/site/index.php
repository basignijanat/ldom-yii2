<?php

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>

<?= $this->render('_languages', [
    'languages' => $languages,
    'title' => Yii::t('app\main', 'Popular Languages'),
])?>

<? if ($teachers): ?>  
  <div class="section has-background-white-ter">                
    <h3 class="title">
      <?= Yii::t('app\main', 'Our Teachers') ?>
    </h3>
      <div class="container owl-carousel owl-theme">
          <? foreach ($teachers as $teacher): ?>
              <? $user = $teacher->getUser() ?>
              <div class="box carousel-box">
                  <div class="column is-half is-offset-one-quarter">
                      <div class="image is-5by3 is-128x128">
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