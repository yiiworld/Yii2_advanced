<?php
/**
 * Created by PhpStorm.
 * User: BigKuCha
 * Date: 14-7-30
 * Time: 下午8:37
 */

namespace common\widgets;


use yii\web\AssetBundle;

class DateTimePickerAsset extends AssetBundle
{
    public $sourcePath = '@backend/web/plugin/datetimepicker';
    public $js = [
        'jquery.datetimepicker.js',
    ];
    public $css = [
        'jquery.datetimepicker.css'
    ];
    public $depends = [

    ];
} 