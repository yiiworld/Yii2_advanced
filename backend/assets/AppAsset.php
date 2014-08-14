<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@backend/web/core-assets';
    public $baseUrl = '@web/core-assets';
    public $jsOptions = [
//        'position'=>View::POS_HEAD,
    ];
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ace.min.css',
        'css/ace-rtl.min.css',
        'css/ace-skins.min.css',

    ];
    public $js = [
        'js/ace-extra.min.js',
        'js/bootstrap.min.js',
        'js/typeahead-bs2.min.js',
        'js/ace-elements.min.js',
        'js/ace.min.js',
    ];
    public $depends = [
        'backend\assets\IE7Asset',
        'backend\assets\LteIe8Asset',
        'backend\assets\LtIe9Asset',
        'backend\assets\IeAsset',
        'backend\assets\NotIeAsset',
        'backend\assets\CookieAsset',
    ];
}
