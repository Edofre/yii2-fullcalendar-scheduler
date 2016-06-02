<?= \edofre\fullcalendarscheduler\FullcalendarScheduler::widget([
	'clientOptions' => [
		'now'               => '2016-05-07',
		'editable'          => true, // enable draggable events
		'aspectRatio'       => 1.8,
		'scrollTime'        => '00:00', // undo default 6am scrollTime
		'header'            => [
			'left'   => 'today prev,next',
			'center' => 'title',
			'right'  => 'timelineDay,timelineThreeDays,agendaWeek,month',
		],
		'defaultView'       => 'timelineDay',
		'views'             => [
			'timelineThreeDays' => [
				'type'     => 'timeline',
				'duration' => ['days' => 3],
			],
		],
		'resourceLabelText' => 'Rooms',

			resources: { // you can also specify a plain string like 'json/resources.json'
				url: 'json/resources.json',
				error: function() {
					$('#script-warning').show();
				}
			},

			events: { // you can also specify a plain string like 'json/events.json'
				url: 'json/events.json',
				error: function() {
					$('#script-warning').show();
				}
			}
		});
	
	});

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#script-warning {
		display: none;
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		text-align: center;
		font-weight: bold;
		font-size: 12px;
		color: red;
	}

	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 50px auto;
	}

</style>
</head>
<body>

	<div id='script-warning'>
		This page should be running from a webserver, to allow fetching from the <code>json/</code> directory.
	</div>

	<div id='loading'>loading...</div>

	<div id='calendar'></div>

</body>
</html>
