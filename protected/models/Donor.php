<?php

Yii::import('application.models._base.BaseDonor');

class Donor extends BaseDonor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}