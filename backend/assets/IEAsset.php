<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-1
 * Time: 下午10:18
 */

namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class IEAsset extends AssetBundle
{
    public $basePath = '@backend/web/core-assets';
    public $baseUrl = '@web/core-assets';
    public $cssOptions = ['condition' => 'IE'];
    public $jsOptions = [
        'condition' => 'IE',
//        'position'=>View::POS_END,
    ];
    public $css = [
    ];
    public $js = [
        'js/jquery-1.10.2.min.js',
    ];
} 