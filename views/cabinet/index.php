<?

use yii\helpers\Html;

$this->title = Yii::$app->name.': '.Yii::t('app\main', 'My Cabinet');
?>

<?
    $base_properties = [
        [
            'name' => 'username',
            'value' => $user->username,
            'title' => 'Email',
        ],
        [
            'name' => 'password_new',
            'value' => '****',
            'title' => 'Password',
        ],
    ];
    
    $sup_properties = [
        [
            'name' => 'fname',
            'value' => $user->fname,
            'title' => 'First Name',
        ],
        [
            'name' => 'mname',
            'value' => $user->mname,
            'title' => 'Middle Name',
        ],
        [
            'name' => 'lname',
            'value' => $user->lname,
            'title' => 'Last Name',
        ],
    ];
?>

<div class="section has-background-white-ter">
    <div class="container">
        <?= Html::tag('h1', Yii::t('app\main', 'My Cabinet'), ['class' => 'title']) ?>        
                
        
                <? foreach ($base_properties as $property): ?>
                    <?= $this->render('_property', [
                        'user' => $user,
                        'property' => $property,
                    ]) ?>
                <? endforeach ?>
                <hr>
                <? foreach ($sup_properties as $property): ?>
                    <?= $this->render('_property', [
                        'user' => $user,
                        'property' => $property,
                    ]) ?>
                <? endforeach ?>
                <hr>
                <div class="columns">
                    <div class="column is-half">
                        <?= Html::beginForm('/cabinet/edit', 'post', [
                            'class' => 'field control',
                            'enctype' => 'multipart/form-data',
                        ]) ?>
                            <?= Html::activeHiddenInput($user, 'username') ?>
                            <div class="field control file has-name is-info">                                    
                                <label class="file-label">
                                    <?= Html::activeFileInput($user, 'image_file', [
                                        'class' => 'file-input',
                                        'accept' => 'image/jpeg,image/png'
                                    ]) ?>                
                                    <span class="file-cta">
                                        <?= Html::tag('span', Yii::t('app\admin', 'Choose a file'), ['class' => 'file-label']) ?>                                
                                    </span>
                                    <span class="file-name" id="userpic-file-name"></span>
                                </label>                                    
                            </div>
                            <div class="field control">
                                <?= Html::submitButton(Yii::t('app\main', 'Load Image'), [
                                    'class' => 'button is-primary',                             
                                ]) ?>
                            </div>
                        <?= Html::endForm() ?>
                    </div>
                    <div class="column">
                        <? if ($user->userpic): ?>                
                            <?= Html::img($user->userpic, [
                                'width' => '150px', 
                                'alt' => 'Userpic'
                            ]) ?>		            
                        <? else: ?>
                            <?= Html::tag('span', null, []) ?>                
                        <? endif ?>
                    </div>
                </div>
            </div>
</div>