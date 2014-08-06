<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-2
 * Time: 上午9:08
 */

namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class LteIE8Asset extends AssetBundle
{
    public $basePath = '@backend/web/core-assets';
    public $baseUrl = '@web/core-assets';
    public $cssOptions = ['condition' => 'lte IE 8'];
    public $jsOptions = [
        'condition' => 'lte IE 8',
//        'position'=>View::POS_BEGIN,
    ];
    public $css = [
        'css/ace-ie.min.css',
    ];
    public $js = [
        'js/excanvas.min.js',
    ];
}
