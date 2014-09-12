<?php

Yii::import('application.models._base.BaseNationality');

class Nationality extends BaseNationality
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}