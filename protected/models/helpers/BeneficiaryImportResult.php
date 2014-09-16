<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BeneficiaryImportResult
 *
 * @author hani.hawasli
 */


class BeneficiaryImportResult implements AjaxResponseInterface {
    private $count_inserted;
    private $count_updated;
    private $record_inserted;
    private $record_updated;
    private $count_all;
    private $error;
    
    public function get_error () {
        return $this->error;
    }
    
    public function get_count_inserted() {
        return $this->count_inserted;
    }
    
    public function get_count_updated() {
        return $this->count_updated;
    }
    
    public function get_record_inserted() {
        return $this->record_inserted;
    }
    
    public function get_record_updated() {
        return $this->record_updated;
    }
    
    public function set_error($error) {
        $this->error = $error;
    }
    
    public function set_count_inserted($count) {
        $this->count_inserted = $count;
    }
    
    public function set_count_updated($count) {
        $this->count_updated = $count;
    }
    
    public function set_record_inserted($record) {
        $this->record_inserted = $record;
    }
    
    public function set_record_updated($record) {
        $this->record_updated = $record;
    }
    
    public function getErrors() {
        return [$this->error];
    }

    public function getResponseData() {
        $result = [];
        $result['count_inserted'] = $this->count_inserted;
        $result['count_updated'] = $this->count_updated;
        $result['count_all'] = $this->count_all;
        $result['record_inserted'] = $this->record_inserted;
        $result['record_updated'] = $this->record_updated;
        return $result;
    }

//put your code here
}
