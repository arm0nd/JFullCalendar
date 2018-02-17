<?php

namespace arm0nd\JFullCalendar;

use yii\web\AssetBundle;

/**
 * Class SelectizeAsset
 *
 * @package yii2mod\selectize
 */
class JFullCalendarAsset extends AssetBundle
{
    /**
     * @var string the directory that contains the source asset files for this asset bundle
     */
    public $sourcePath = '@vendor/rmd/JFullCalendar/assets';

    /**
     * @var array list of CSS files that this bundle contains
     */
    public $css = [
        'fullcalendar/fullcalendar_gebo.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains
     */
    public $js = [
        'fullcalendar/jalali.js',
        'fullcalendar/fullcalendar.min.js',
    ];

    /**
     * @var array list of bundle class names that this bundle depends on
     */
    public $depends = [
        'yii\jui\JuiAsset',
        'yii\web\JqueryAsset',
        'xj\bootbox\BootboxAsset',

    ];
}
