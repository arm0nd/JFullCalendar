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
    public $sourcePath = '@vendor/arm0nd/JFullCalendar';

    /**
     * @var array list of CSS files that this bundle contains
     */
    public $css = [
        'assets/fullcalendar/fullcalendar.min.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains
     */
    public $js = [
        'lib/moment.min.js',
        'lib/moment-jalaali.js',
        'assets/fullcalendar/fullcalendar.min.js',
        'locale/fa.js',
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
