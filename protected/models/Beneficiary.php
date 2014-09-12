<?php

Yii::import('application.models._base.BaseBeneficiary');

class Beneficiary extends BaseBeneficiary
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}