<?php

Yii::import('application.models._base.BaseCommunity');

class Community extends BaseCommunity implements AjaxResponseInterface
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function getErrors() {
        
    }

    public function getResponseData() {
        return $this->getAttributes();
    }

}