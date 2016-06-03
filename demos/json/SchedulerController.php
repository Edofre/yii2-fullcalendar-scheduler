<?php
namespace frontend\controllers;

use edofre\fullcalendarscheduler\models\Event;
use edofre\fullcalendarscheduler\models\Resource;
use Yii;
use yii\web\Controller;

/**
 * Example of how your controller can return the json data for events and resources
 *
 * Used in the json.php demo
 *
 * Class SchedulerController
 * @package frontend\controllers
 */
class SchedulerController extends Controller
{
	/**
	 * @param $id
	 * @return array
	 */
	public function actionResources($id)
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return [
			new Resource(["id" => "a", "title" => "Auditorium A"]),
			new Resource(["id" => "b", "title" => "Auditorium B", "eventColor" => "green"]),
			new Resource(["id" => "c", "title" => "Auditorium C", "eventColor" => "orange"]),
			new Resource([
				"id" => "d", "title" => "Auditorium D", "children" => [
					new Resource(["id" => "d1", "title" => "Room D1"]),
					new Resource(["id" => "d2", "title" => "Room D2"]),
				],
			]),
			new Resource(["id" => "e", "title" => "Auditorium E"]),
			new Resource(["id" => "f", "title" => "Auditorium F", "eventColor" => "red"]),
			new Resource(["id" => "g", "title" => "Auditorium G"]),
			new Resource(["id" => "h", "title" => "Auditorium H"]),
			new Resource(["id" => "i", "title" => "Auditorium I"]),
			new Resource(["id" => "j", "title" => "Auditorium J"]),
			new Resource(["id" => "k", "title" => "Auditorium K"]),
			new Resource(["id" => "l", "title" => "Auditorium L"]),
			new Resource(["id" => "m", "title" => "Auditorium M"]),
			new Resource(["id" => "n", "title" => "Auditorium N"]),
			new Resource(["id" => "o", "title" => "Auditorium O"]),
			new Resource(["id" => "p", "title" => "Auditorium P"]),
			new Resource(["id" => "q", "title" => "Auditorium Q"]),
			new Resource(["id" => "r", "title" => "Auditorium R"]),
			new Resource(["id" => "s", "title" => "Auditorium S"]),
			new Resource(["id" => "t", "title" => "Auditorium T"]),
			new Resource(["id" => "u", "title" => "Auditorium U"]),
			new Resource(["id" => "v", "title" => "Auditorium V"]),
			new Resource(["id" => "w", "title" => "Auditorium W"]),
			new Resource(["id" => "x", "title" => "Auditorium X"]),
			new Resource(["id" => "y", "title" => "Auditorium Y"]),
			new Resource(["id" => "z", "title" => "Auditorium Z"]),
		];
	}

	/**
	 * @param $id
	 * @param $start
	 * @param $end
	 * @return array
	 */
	public function actionEvents($id, $start, $end)
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return [
			new Event(["id" => "1", "resourceId" => "b", "start" => "2016-05-07T02:00:00", "end" => "2016-05-07T07:00:00", "title" => "event 1"]),
			new Event(["id" => "2", "resourceId" => "c", "start" => "2016-05-07T05:00:00", "end" => "2016-05-07T22:00:00", "title" => "event 2"]),
			new Event(["id" => "3", "resourceId" => "d", "start" => "2016-05-06", "end" => "2016-05-08", "title" => "event 3"]),
			new Event(["id" => "4", "resourceId" => "e", "start" => "2016-05-07T03:00:00", "end" => "2016-05-07T08:00:00", "title" => "event 4"]),
			new Event(["id" => "5", "resourceId" => "f", "start" => "2016-05-07T00:30:00", "end" => "2016-05-07T02:30:00", "title" => "event 5"]),
		];
	}
}
