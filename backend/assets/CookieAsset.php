<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-14
 * Time: 下午9:23
 */

namespace backend\assets;


use yii\web\AssetBundle;

class CookieAsset extends AssetBundle
{
    public $sourcePath = '@backend/web/js';
    public $js = [
        'jquery.cookie.js',
    ];
    public $depends = [
    ];
} 