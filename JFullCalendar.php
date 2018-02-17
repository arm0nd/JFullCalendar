<?php

namespace arm0nd\JFullCalendar;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Json;


class JFullCalendar extends Widget
{
    /**
     * Html ID
     * @var string
     */
    public $id = 'calendar';

    /**
     * @var string Google's calendar URL.
     */
    public $googleCalendarUrl;

    /**
     * @var string Theme's CSS file.
     */
    public $themeCssFile;

    /**
     * @var array FullCalendar's options.
     */
    public $options=array();

    /**
     * @var array HTML options.
     */
    public $htmlOptions=array();

    /**
     * @var bool
     */
    public $loadPrintCss=false;

    /**
     * @var string Language code as ./locale/<code>.php file
     */
    public $lang;

    public function run()
    {
//        parent::run();
        JFullCalendarAsset::register($this->getView());
        if ($this->lang) {
            $this->registerLocale();
        }
        $this->registerFiles();
        $this->showOutput();
    }

    public function registerLocale()
    {
        $langFile=dirname(__FILE__).'/locale/'.$this->lang.'.php';
        if (file_exists($langFile))
//            $this->options=CMap::mergeArray($this->options, include($langFile));
            $this->options = ArrayHelper::merge($this->options, include ($langFile));
    }

    public function registerFiles()
    {
        $assetsDir=(defined(__DIR__) ? __DIR__ : dirname(__FILE__)).'/assets';
//        $assets=Yii::app()->assetManager->publish($assetsDir);
        $assets = Yii::$app->assetManager->publish($assetsDir);

//        $ext = YII_DEBUG ? 'js' : 'min.js';
//        $cs=Yii::app()->clientScript;
//        $cs->registerCoreScript('jquery');
//        $cs->registerScriptFile($assets.'/fullcalendar/jquery-1.10.2.min.js');
//        $cs->registerScriptFile($assets.'/fullcalendar/jquery-ui-1.10.3.custom.min.js');
//        $cs->registerScriptFile($assets.'/fullcalendar/jalali.js');
//        $cs->registerScriptFile($assets.'/fullcalendar/fullcalendar.'.$ext);
//        /* $cs->registerScriptFile($assets.'/fullcalendar/jquery-ui-1.8.23.custom.min.js');
//        $cs->registerCssFile($assets.'/fullcalendar/fullcalendar.css'); */
//        $cs->registerCssFile($assets.'/fullcalendar/fullcalendar_gebo.css');

//        if ($this->loadPrintCss) {
//            $cs->registerCssFile($assets.'/fullcalendar/fullcalendar.print.css');
//        }
//        if ($this->googleCalendarUrl) {
//            $cs->registerScriptFile($assets.'/fullcalendar/gcal.js');
//            $this->options['events']=$this->googleCalendarUrl;
//        }
//        if ($this->themeCssFile) {
//            $this->options['theme']=true;
//            $cs->registerCssFile($assets.'/themes/'.$this->themeCssFile);
//        }

//        $BootBoxBaseUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.bootbox'));
//        $cs->registerScriptFile($BootBoxBaseUrl . '/bootstrap.bootbox.min.js');

        $js='var '. $this->id .' = $("#'.$this->id.'").fullCalendar('.Json::encode($this->options).');';
        \Yii::$app->view->registerJs($js,[View::POS_READY],__CLASS__.'#'.$this->id);
    }

    public function showOutput()
    {
        if (! isset($this->htmlOptions['id']))
            $this->htmlOptions['id']=$this->id;

//        echo CHtml::tag('div', $this->htmlOptions,'');
        Html::tag('div','', $this->htmlOptions);
    }
}