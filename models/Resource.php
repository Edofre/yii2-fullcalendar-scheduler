<?php

namespace edofre\fullcalendarscheduler\models;

class Resource extends \yii\base\Model
{
	/** @var  string Uniquely identifies the given resource. */
	public $id;

	/** @var  string The text on an resource's element */
	public $title;

	/**
	 * @return array
	 */
	public function rules()
	{
		return [
			[['id', 'title'], 'required'],
		];
	}

}
