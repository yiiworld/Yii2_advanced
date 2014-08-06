<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-2
 * Time: 上午9:09
 */

namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class LtIE9Asset extends AssetBundle
{
    public $basePath = '@backend/web/core-assets';
    public $baseUrl = '@web/core-assets';
    public $cssOptions = ['condition' => 'lt IE 9'];
    public $jsOptions = [
        'condition' => 'lt IE 9',
//        'position'=>View::POS_BEGIN
    ];
    public $css = [
    ];
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
    ];
} 