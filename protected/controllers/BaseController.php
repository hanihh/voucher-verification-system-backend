<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author hani.hawasli
 */
class BaseController extends GxController {

    public function filters() {

        return array(
            array(
                'ext.starship.RestfullYii.filters.ERestFilter + 
                REST.GET, REST.PUT, REST.POST, REST.DELETE'
            ),
        );
    }

    public function actions() {
        return array(
            'REST.' => 'ext.starship.RestfullYii.actions.ERestActionProvider',
        );
    }

    public function accessRules() {
        return array(
            array('allow', 'actions' => array('REST.GET', 'REST.PUT', 'REST.POST', 'REST.DELETE'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    protected function sendAjaxResponse(AjaxResponseInterface $model) {
        $success = count($model->getErrors()) === 0;
        $result_code = $success ? 200 : 404;
        header('Content-type: application/json', true, $result_code);
        echo json_encode([
            'success' => $success,
            'data' => $model->getResponseData(),
            'errors' => $model->getErrors(),
        ]);
        Yii::app()->end();
    }

}
