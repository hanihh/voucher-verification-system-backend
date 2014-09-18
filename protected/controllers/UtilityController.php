<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilityController
 *
 * @author hani.hawasli
 */

Yii::import('application.controllers.BaseController');
require_once(Yii::app()->basePath . '/extensions/qrcode/phpqrcode/qrlib.php');

//require_once(Yii::app()->basePath . '/extensions/qrcode/phpqrcode/qrlib.php');
class UtilityController extends BaseController {
    
    public function actionQrGenerate() {
   
        $qr_path = Yii::app()->getBasePath().DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.Yii::app()->params['VOUCHERS_QR_PATH'];
        if ((isset($_REQUEST['qrdata'])) && (!empty($_REQUEST['qrdata']))) {
            $qr_name = ((isset($_REQUEST['qrfilename'])) && (!empty($_REQUEST['qrfilename']))) ? preg_replace("/[^a-zA-Z0-9s.]/", "_", $_REQUEST['qrfilename']).".png" :time() . ".png";
            $qr_path = ((isset($_REQUEST['qrfilepath'])) && (!empty($_REQUEST['qrfilepath'])) && preg_match('#^(\w+/){1,2}\w+\.\w+$#',$qr_path)) ? $_REQUEST['qrfilepath'] : $qr_path;
            $size = ((isset($_REQUEST['qrsize'])) && (!empty($_REQUEST['qrsize'])) && preg_match('/^[1-9]$/',$_REQUEST['qrsize'])) ? $_REQUEST['qrsize'] : 4; 
            header('Content-type: application/json', true, 200);
            $result1 = QRcode::png($_REQUEST['qrdata'], $qr_path.$qr_name, 'M', $size, false);
            $result_code = 200;
            $result = [];
            $result['qrdata'] = $_REQUEST['qrdata'];
            $result['qrfilename'] = $qr_name;
            $result['qrfilepath'] = $qr_path;
            $result['qrfullpath'] = $qr_path.$qr_name;
            echo CJSON::encode([
                'success' => 200,
                'data' => $result,
                'errors' => '',
            ]);
            Yii::app()->end();  
        }
    }
    
    public function actionQrGenerateLocally($qrdata = "", $qrname = "", $qrpath = "", $size = 4) { 
        
        
    }
}
