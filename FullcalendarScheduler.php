<?php

namespace edofre\fullcalendarscheduler;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;

/**
 * Class FullcalendarScheduler
 * @package edofre\fullcalendarscheduler
 */
class FullcalendarScheduler extends \yii\base\Widget
{
	/**
	 * @var array  The fullcalendar options, for all available options check http://fullcalendar.io/docs/
	 */
	public $clientOptions = [
		'weekends' => true,
		'default'  => 'timelineDay',
		'editable' => false,
	];
	/**
	 * @var array  Array containing the events, can be JSON array, PHP array or URL that returns an array containing JSON events
	 */
	public $events = [];
	/**
	 * @var array  Array containing the resources, can be JSON array, PHP array or URL that returns an array containing JSON resources
	 */
	public $resources = [];
	/** @var boolean  Determines whether or not to include the gcal.js */
	public $googleCalendar = false;
	/**
	 * @var array
	 * Possible header keys
	 * - center
	 * - left
	 * - right
	 * Possible options:
	 * - title
	 * - prevYear
	 * - nextYear
	 * - prev
	 * - next
	 * - today
	 * - basicDay
	 * - agendaDay
	 * - basicWeek
	 * - agendaWeek
	 * - month
	 */
	public $header = [
		'center' => 'title',
		'left'   => 'prev,next, today',
		'right'  => 'timelineDay,timelineWeek,timelineMonth,timelineYear',
	];
	/** @var string  Text to display while the calendar is loading */
	public $loading = 'Please wait, calendar is loading';
	/**
	 * @var array  Default options for the id and class HTML attributes
	 */
	public $options = [
		'id'    => 'calendar',
		'class' => 'fullcalendar',
	];
	/**
	 * @var boolean  Whether or not we need to include the ThemeAsset bundle
	 */
	public $theme = false;

	/**
	 * Always make sure we have a valid id and class for the Fullcalendar widget
	 */
	public function init()
	{
		if (!isset($this->options['id'])) {
			$this->options['id'] = $this->getId();
		}
		if (!isset($this->options['class'])) {
			$this->options['class'] = 'fullcalendar';
		}

		parent::init();
	}

	/**
	 * Load the options and start the widget
	 */
	public function run()
	{
		echo Html::beginTag('div', $this->options) . "\n";
		echo Html::beginTag('div', ['class' => 'fc-loading', 'style' => 'display:none;']);
		echo Html::encode($this->loading);
		echo Html::endTag('div') . "\n";
		echo Html::endTag('div') . "\n";

		$assets = CoreAsset::register($this->view);

		// Register the theme
		if ($this->theme === true) {
			ThemeAsset::register($this->view);
		}

		if (isset($this->options['language'])) {
			$assets->language = $this->options['language'];
		}

		$assets->googleCalendar = $this->googleCalendar;
		$this->clientOptions['header'] = $this->header;

		$this->view->registerJs(implode("\n", [
			"jQuery('#{$this->options['id']}').fullCalendar({$this->getClientOptions()});",
		]), View::POS_READY);
	}

	/**
	 * @return string
	 * Returns an JSON array containing the fullcalendar options,
	 * all available callbacks will be wrapped in JsExpressions objects if they're set
	 */
	private function getClientOptions()
	{
		$options['loading'] = new JsExpression("function(isLoading, view ) {
			jQuery('#{$this->options['id']}').find('.fc-loading').toggle(isLoading);
        }");

		// Load the events
		$options['events'] = $this->events;
		$options['resources'] = $this->resources;
		$options = array_merge($options, $this->clientOptions);

		return Json::encode($options);
	}

}
