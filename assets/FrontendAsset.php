<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends \yii\web\AssetBundle
{  
    public $sourcePath = '@app/assets/frontend';

    public $css = [
        'css/bootstrap.css',
        'css/styles.css',
        'css/font-awesome.min.css',
        'css/animate-custom.css',
        'css/custom.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/modernizr.custom.js',
        'js/bootstrap.min.js',
        'js/jquery.easing.1.3.js',
        'js/smoothscroll.js',
        'js/custom-scripts.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
