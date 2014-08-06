<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-5
 * Time: 下午8:54
 */

namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class ArtDialogAsset extends AssetBundle
{
    public $basePath = '@backend/';
    public $baseUrl = '@web/';
    public $jsOptions = [
        'position'=>View::POS_BEGIN,
    ];
    public $css = [
        '',
    ];
    public $js = [
        'js/artDialog/artDialog.source.js?skin=default',
        'js/artDialog/plugins/iframeTools.js',
//        'js/jquery.form.js',
    ];
} 