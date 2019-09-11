<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'css/bulma.css',
        'css/custom.css',
        'owlcarousel/assets/owl.carousel.min.css',
        'owlcarousel/assets/owl.theme.default.min.css',
    ];
    public $js = [
        //'//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',        
        'owlcarousel/owl.carousel.min.js',
        'https://cloud.tinymce.com/stable/tinymce.min.js',
		'js/main.js',
    ];
    public $depends = [
        //'app\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
