<?php

Yii::import('application.controllers.BaseController');
require_once(Yii::app()->basePath . '/extensions/qrcode/phpqrcode/qrlib.php');

class VoucherController extends BaseController {

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Voucher'),
        ));
    }

    public function actionCreate() {
        $model = new Voucher;


        if (isset($_POST['Voucher'])) {
            $model->setAttributes($_POST['Voucher']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Voucher');


        if (isset($_POST['Voucher'])) {
            $model->setAttributes($_POST['Voucher']);

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Voucher')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Voucher');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Voucher('search');
        $model->unsetAttributes();

        if (isset($_GET['Voucher']))
            $model->setAttributes($_GET['Voucher']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionGenerate() {
        $model = new Beneficiary('searchForVoucherAssignment');
        $model->unsetAttributes();
        if ((isset($_POST) && !empty($_POST))) {
            $subdistribution = Subdistribution::model()->findByPk($_POST['subdistribution_id']);
            if ($subdistribution) {
                // getting Voucher Types assosiated to this distribution.
                $distributionVouchers = $subdistribution->distributionVouchers;

                // getting The 'PENDING' status
                $criteria = new CDbCriteria;
                $criteria->addCondition('name="PENDING"'); // created Status for vouchers
                $status = VoucherStatus::model()->find($criteria);

                // Choose eligible beneficiaries -- who are not registered in this distribution (Not sub distribution)
                $criteria3 = new CDbCriteria;
                $criteria_string = "t.id in (0";
                foreach ($_POST['beneficiaries'] as $ben_id) {
                    $criteria_string = $criteria_string . ", " . $ben_id;
                }
                $criteria_string = $criteria_string . ")";
                $criteria3->addCondition($criteria_string);
                $beneficiaries = Beneficiary::model()->findAll($criteria3);
                $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $random_string_length = 10;

                foreach ($beneficiaries as $beneficiary) { // for each beneficiary 
                    foreach ($distributionVouchers as $distributionVoucher) { // for each voucher type
                        //try to find an existing voucher assosiated to this beneficiary
                        $criteria4 = new CDbCriteria();
                        $criteria4->condition = "ben_id = " . $beneficiary->id . " and distribution_voucher_id = " . $distributionVoucher->id;
                        $exist = Voucher::model()->findAll($criteria4);
                        // if no voucher found : 
                        if (count($exist) == 0) {
                            $voucher = new Voucher(); // create voucher 
                            $string = '';
                            $exist = "";
                            //Generate random number
                            do {
                                for ($i = 0; $i < $random_string_length; $i++) {
                                    $string .= $characters[rand(0, strlen($characters) - 1)];
                                }
                                $exist = Voucher::model()->exists('code =:code', array(":code" => $string));
                            } while ($exist == "1");
                            $voucher->code = $string;
                            $voucher->distribution_voucher_id = $distributionVoucher->id;
                            $voucher->ben_id = $beneficiary->id;
                            $voucher->vendor = NULL;
                            $voucher->status_id = $status->id;
                            $voucher->create_date = new CDbExpression('NOW()');
                            $voucher->insert();
                            $voucher->save();
                        }
                    }
                }
            }
        } else {
            if (isset($_GET['Beneficiary']))
                $model->setAttributes($_GET['Beneficiary']);

            $this->render('generate', array(
                'model' => $model,
            ));
            //$this->render('generate');
        }
    }

    public function actionPrint($id) {

        if (preg_match('/^[0-9]+$/', $id)) {
            $voucher = Voucher::model()->findByPk($id);
            if ($voucher) {
                if (!is_dir(Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id)) {
                    mkdir(Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id);
                }

                if (!is_dir(Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->id)) {
                    mkdir(Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->id);
                }

                //if(!is_dir(Yii::app()->params['VOUCHERS_EXPORT_PATH'].DIRECTORY_SEPARATOR.$voucher->distributionVoucher->subdistribution->distribution->id)){
                //    mkdir(Yii::app()->params['VOUCHERS_EXPORT_PATH'].DIRECTORY_SEPARATOR.$voucher->distributionVoucher->subdistribution->distribution->id);
                //}
                $export_path = Yii::app()->params['VOUCHERS_EXPORT_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id . DIRECTORY_SEPARATOR;
                //$qr_path = Yii::app()->params['VOUCHERS_QR_PATH'].DIRECTORY_SEPARATOR.$voucher->distributionVoucher->subdistribution->distribution->id.DIRECTORY_SEPARATOR.$voucher->distributionVoucher->subdistribution->id;
                //Yii::app()->createUrl('//Utility/QrGenerate',array("qrdata"=>$voucher->code, 'qrfilename' => $voucher->ben->registration_code . "_".$voucher->distributionVoucher->value, 'qrfilepath'=> $qr_path));
                $qr_path = Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->id . DIRECTORY_SEPARATOR;
                QRCode::png($voucher->code, $qr_path . $voucher->code . ".png", QR_ECLEVEL_M, 4, 1);
                header('Content-Type: text/html; charset=utf-8');

                $html_output = "<style type=\"text/css\">
                        table { page-break-inside:avoid }
                        .printing tr { text-align: center;}
                        tr    { page-break-inside:avoid; page-break-after:auto; text-align: center;}
                        thead { display:table-header-group }
                        tfoot { display:table-footer-group }
                        </style>";
                $html_output .= '<table  align="center" class="printing" style=" empty-cells: show; border: 1px solid; text-align:center">
                            <tr>
                                    <td rowspan="2" colspan="2"><span style="font-size: 17pt; text-align: center;">' . $voucher->distributionVoucher->subdistribution->distribution->title_en . '<br />' . $voucher->distributionVoucher->subdistribution->distribution->title_ar . '</span></td>
                                    <td rowspan="2" style="border-left: 2px dashed;  padding: 5px 10px 0px; vertical-align:top;" align="top"><img style="height: 70px;" src="' . Yii::app()->baseUrl . ".." . DIRECTORY_SEPARATOR . Yii::app()->params['ASSET_PATH'] . 'logo.gif"></img></td>
                                    <td rowspan="2" style="width: 200px;"><span style="font-size: 17pt; text-align: center; ">' . $voucher->distributionVoucher->subdistribution->distribution->title_en . '<br />' . $voucher->distributionVoucher->subdistribution->distribution->title_ar . '</span></td>
                                    <td style="height: 70px; padding-top: 5px;">' . CHtml::image(Yii::app()->baseUrl . ".." . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->donor->logo_path, "", array("style" => "width:100px;")) . '</td>
                            </tr>
                            <tr>
                                    <td><span style="font-size: 6pt; text-align: center;">
                                            ' . $voucher->distributionVoucher->subdistribution->distribution->donor->slogan_en . '<br />
                                            ' . $voucher->distributionVoucher->subdistribution->distribution->donor->slogan_ar . '
                                    </span></td>
                            </tr>
                            <tr>
                                    <td style="padding-left: 5px;font-size: 14pt; vertical-align: bottom;">ID#: ' . $voucher->ben->registration_code . '</td>
                                    <td style="text-align: center; padding: 30px 14px 0px;" rowspan="3">' .
                        CHtml::image(Yii::app()->baseUrl . ".." . DIRECTORY_SEPARATOR . Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->id . DIRECTORY_SEPARATOR . $voucher->code . ".png") . '<br />' . $voucher->code . '</td>
                                    <td style="border-left: 2px dashed;" rowspan="3"> </td>
                                    <td style="font-size: 16pt; vertical-align: bottom;">ID#: ' . $voucher->ben->registration_code . '</td>
                                    <td style="text-align: center; padding-top: 30px;" rowspan="3">' .
                        CHtml::image(Yii::app()->baseUrl . ".." . DIRECTORY_SEPARATOR . Yii::app()->params['VOUCHERS_QR_PATH'] . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->distribution->id . DIRECTORY_SEPARATOR . $voucher->distributionVoucher->subdistribution->id . DIRECTORY_SEPARATOR . $voucher->code . ".png") . '<br />' . $voucher->code . '</td>
                            </tr>
                            <tr>
                                    <td style="font-size: 16pt; vertical-align: top;">Value: $' . $voucher->distributionVoucher->value . '</td>
                                    <td style="font-size: 16pt; vertical-align: top;">Value: $' . $voucher->distributionVoucher->value . '</td>
                            </tr>
                            <tr>
                                    <td style="padding-left: 10px; vertical-align: bottom; text-align: right;">Exp: ' . date("d/m/Y", strtotime($voucher->distributionVoucher->expiration_date)) . '</td>
                                    <td style="vertical-align: bottom; text-align: right;">Exp: ' . date("d/m/Y", strtotime($voucher->distributionVoucher->expiration_date)) . '</td>
                            </tr>
                    </table><br /><br />';
                return $html_output;
            } else {
                header('Content-type: application/json', true, 200);
                echo CJSON::encode(['error' => 'No Voucher With the number ' . $id]);
            }
        } else {
            header('Content-type: application/json', true, 200);
            echo CJSON::encode(['error' => 'Invalid Request']);
        }
    }

}
