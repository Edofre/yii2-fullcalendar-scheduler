# Yii2 fullcalendar scheduler component

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require edofre/yii2-fullcalendar-scheduler "V1.1.4"
```

or add

```
"edofre/yii2-fullcalendar-scheduler": "V1.1.4"
```

to the ```require``` section of your `composer.json` file.

## Usage

See the demos/ folder for all the examples.

### Simple usage with array data
```php
<?= \edofre\fullcalendarscheduler\FullcalendarScheduler::widget([
	'header'        => [
		'left'   => 'today prev,next',
		'center' => 'title',
		'right'  => 'timelineDay,timelineThreeDays,agendaWeek,month',
	],
	'clientOptions' => [
		'now'               => '2016-05-07',
		'editable'          => true, // enable draggable events
		'aspectRatio'       => 1.8,
		'scrollTime'        => '00:00', // undo default 6am scrollTime
		'defaultView'       => 'timelineDay',
		'views'             => [
			'timelineThreeDays' => [
				'type'     => 'timeline',
				'duration' => [
					'days' => 3,
				],
			],
		],
		'resourceLabelText' => 'Rooms',
		'resources'         => [
			['id' => 'a', 'title' => 'Auditorium A'],
			['id' => 'b', 'title' => 'Auditorium B', 'eventColor' => 'green'],
			['id' => 'c', 'title' => 'Auditorium C', 'eventColor' => 'orange'],
			[
				'id'       => 'd', 'title' => 'Auditorium D',
				'children' => [
					['id' => 'd1', 'title' => 'Room D1'],
					['id' => 'd2', 'title' => 'Room D2'],
				],
			],
			['id' => 'e', 'title' => 'Auditorium E'],
			['id' => 'f', 'title' => 'Auditorium F', 'eventColor' => 'red'],
			['id' => 'g', 'title' => 'Auditorium G'],
			['id' => 'h', 'title' => 'Auditorium H'],
			['id' => 'i', 'title' => 'Auditorium I'],
			['id' => 'j', 'title' => 'Auditorium J'],
			['id' => 'k', 'title' => 'Auditorium K'],
			['id' => 'l', 'title' => 'Auditorium L'],
			['id' => 'm', 'title' => 'Auditorium M'],
			['id' => 'n', 'title' => 'Auditorium N'],
			['id' => 'o', 'title' => 'Auditorium O'],
			['id' => 'p', 'title' => 'Auditorium P'],
			['id' => 'q', 'title' => 'Auditorium Q'],
			['id' => 'r', 'title' => 'Auditorium R'],
			['id' => 's', 'title' => 'Auditorium S'],
			['id' => 't', 'title' => 'Auditorium T'],
			['id' => 'u', 'title' => 'Auditorium U'],
			['id' => 'v', 'title' => 'Auditorium V'],
			['id' => 'w', 'title' => 'Auditorium W'],
			['id' => 'x', 'title' => 'Auditorium X'],
			['id' => 'y', 'title' => 'Auditorium Y'],
			['id' => 'z', 'title' => 'Auditorium Z'],
		],
		'events'            => [
			['id' => '1', 'resourceId' => 'b', 'start' => '2016-05-07T02:00:00', 'end' => '2016-05-07T07:00:00', 'title' => 'event 1'],
			['id' => '2', 'resourceId' => 'c', 'start' => '2016-05-07T05:00:00', 'end' => '2016-05-07T22:00:00', 'title' => 'event 2'],
			['id' => '3', 'resourceId' => 'd', 'start' => '2016-05-06', 'end' => '2016-05-08', 'title' => 'event 3'],
			['id' => '4', 'resourceId' => 'e', 'start' => '2016-05-07T03:00:00', 'end' => '2016-05-07T08:00:00', 'title' => 'event 4'],
			['id' => '5', 'resourceId' => 'f', 'start' => '2016-05-07T00:30:00', 'end' => '2016-05-07T02:30:00', 'title' => 'event 5'],
		],
	],
]);
?>
```

### Simple use with JSON data from controller actions
```php
<?= \edofre\fullcalendarscheduler\FullcalendarScheduler::widget([
	'header'        => [
		'left'   => 'today prev,next',
		'center' => 'title',
		'right'  => 'timelineDay,timelineThreeDays,agendaWeek,month',
	],
	'clientOptions' => [
		'now'               => '2016-05-07',
		'editable'          => true, // enable draggable events
		'aspectRatio'       => 1.8,
		'scrollTime'        => '00:00', // undo default 6am scrollTime
		'defaultView'       => 'timelineDay',
		'views'             => [
			'timelineThreeDays' => [
				'type'     => 'timeline',
				'duration' => ['days' => 3],
			],
		],
		'resourceLabelText' => 'Rooms',
		'resources'         => \yii\helpers\Url::to(['scheduler/resources', 'id' => 1]),
		'events'            => \yii\helpers\Url::to(['scheduler/events', 'id' => 2]),
	],
]);
?>
```

#### Controller actions (Controller is also included in the demos/json/ directory)
```php
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
```