<?php

namespace edofre\fullcalendarscheduler;

/**
 * Class CoreAsset
 * @package edofre\fullcalendarscheduler
 */
class CoreAsset extends \yii\web\AssetBundle
{
    /**
     * @var  boolean
     * Whether to automatically generate the needed language js files.
     * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
     * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
     */
    public $autoGenerate = true;
    /** @var  array Required CSS files for the fullcalendar */
    public $css = [
        'fullcalendar/dist/fullcalendar.css',
        'fullcalendar-scheduler/dist/scheduler.css',
    ];
    /** @var  array List of the dependencies this assets bundle requires */
    public $depends = [
        'yii\web\YiiAsset',
        'edofre\fullcalendarscheduler\MomentAsset',
        'edofre\fullcalendarscheduler\PrintAsset',
    ];
    /**
     * @var  boolean
     * FullCalendar can display events from a public Google Calendar. Google Calendar can serve as a backend that manages and persistently stores event data (a feature that FullCalendar currently lacks).
     * Please read http://fullcalendar.io/docs/google_calendar/ for more information
     */
    public $googleCalendar = false;
    /** @var  array Required JS files for the fullcalendar */
    public $js = [
        'fullcalendar/dist/fullcalendar.js',
        'fullcalendar/dist/locale-all.js',
        'fullcalendar-scheduler/dist/scheduler.js',
    ];
    /** @var  string Language for the fullcalendar */
    public $language = null;
    /** @var  string Location of the fullcalendar scheduler distribution */
    public $sourcePath = '@bower';

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        $language = empty($this->language) ? \Yii::$app->language : $this->language;
        if (file_exists($this->sourcePath . "/fullcalendar/dist/locale/$language.js")) {
            $this->js[] = "fullcalendar/dist/locale/$language.js";
        }

        if ($this->googleCalendar) {
            $this->js[] = 'fullcalendar/dist/gcal.js';
        }

        // We need to return the parent implementation otherwise the scripts are not loaded
        return parent::registerAssetFiles($view);
    }
}
