<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-1
 * Time: 下午9:59
 */

namespace backend\assets;


use yii\web\AssetBundle;

class IE7Asset extends AssetBundle
{
    public $basePath = '@backend/web/core-assets';
    public $baseUrl = '@web/core-assets';
    public $cssOptions = ['condition' => 'IE7'];
    public $jsOptions = ['condition' => 'IE7'];
    public $css = [
        'css/font-awesome-ie7.min.css',
    ];
    public $js = [
    ];
} 