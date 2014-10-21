<?php
Yii::import('application.controllers.BaseController');
Yii::import('application.models.helpers.BeneficiaryImportResult');

class BeneficiaryController extends BaseController {

        public function restEvents() {
            $this->onRest('req.get.GetBeneficiaryFordistribution.render', function($distribution_id="", $subdistribution_id="", $include="in") {
                $include = "not in";
                $criteria = "";
                
                if (isset($_GET['include']) and $_GET['include'] != 0) {
                    $include = "in";
                }
                if (isset($_GET['distribution_id']) and $_GET['distribution_id'] != 0) {
                    $criteria = "id " . $include . " (select distinct ben_id from voucher where distribution_voucher_id in (Select id from distribution_voucher where subdistribution_id in (SELECT id FROM `subdistribution` WHERE distribution_id = " . $_GET['distribution_id'] . ")))";
                }

                elseif ((isset($_GET['subdistribution_id']) and $_GET['subdistribution_id'] != 0 and $include == "in")) {
                    $criteria = "id " . $include . " (select distinct ben_id from voucher where distribution_voucher_id in (Select id from distribution_voucher where subdistribution_id  = " . $_GET['subdistribution_id'] . "))";
                }

                elseif ((isset($_GET['subdistribution_id']) and $_GET['subdistribution_id'] != 0 and $include != "in")) {
                    $subdistribution = Subdistribution::model()->findByPk($_GET['subdistribution_id']);
                    $criteria = "id " . $include . " (select distinct ben_id from voucher where distribution_voucher_id in (Select id from distribution_voucher where subdistribution_id in (SELECT id FROM `subdistribution` WHERE distribution_id = " . $subdistribution->distribution_id . ")))";
                }
                echo $criteria;
                $beneficiaries= Beneficiary::model()->findAll($criteria);
                //$model = new Beneficiary('searchForVoucherAssignment');
                //$model->unsetAttributes();
                echo CJSON::encode(['Beneficiaries'=>$beneficiaries]);
            });
        }
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Beneficiary'),
		));
	}

	public function actionCreate() {
		$model = new Beneficiary;


		if (isset($_POST['Beneficiary'])) {
			$model->setAttributes($_POST['Beneficiary']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Beneficiary');


		if (isset($_POST['Beneficiary'])) {
			$model->setAttributes($_POST['Beneficiary']);

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
			$this->loadModel($id, 'Beneficiary')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Beneficiary');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Beneficiary('search');
		$model->unsetAttributes();

		if (isset($_GET['Beneficiary']))
			$model->setAttributes($_GET['Beneficiary']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionGetBeneficiaryFordistribution() {
            $model = new Beneficiary('searchForVoucherAssignment');
            $model->unsetAttributes();
            if (isset($_GET) && !empty($_GET)) {
                if (isset($_GET['distribution_id']) && !empty($_GET['distribution_id'])) {
                    
                }
            }
        }
        
        public function actionImport() {

            $model = new Beneficiary('search');
            $model->unsetAttributes();
            $result = new BeneficiaryImportResult();
            $count_inserted = 0;
            $count_updated = 0;
            if (isset($_FILES) && !empty($_FILES)) {
                move_uploaded_file ($_FILES['UploadFileName'] ['tmp_name'],
                Yii::app()->params['IMPORT_PATH'].$_FILES['UploadFileName'] ['name']);   
                Yii::import('application.extensions.phpexcel.Classes.PHPExcel',true);
                $objReader = new PHPExcel_Reader_Excel5;
                $objPHPExcel = $objReader->load(Yii::app()->params['IMPORT_PATH'].$_FILES['UploadFileName'] ['name']);
                $objWorksheet = $objPHPExcel->getActiveSheet();
                $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
                $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5

                $criteria = new CDbCriteria; 
                $criteria->addCondition('name="Active"'); // created Status for vouchers
                $status = BeneficiaryStatus::model()->find($criteria);
                $inserted_arr = [];
                $updated_arr = [];
                
                for ($row = 2; $row <= $highestRow; ++$row) {
                    $criteria = new CDbCriteria;
                    $criteria->addCondition('registration_code="'.$objWorksheet->getCellByColumnAndRow(0, $row)->getValue().'"'); // created Status for vouchers
                    $beneficiary = Beneficiary::model()->find($criteria);
                    $insert = 0;
                    if (!$beneficiary) {
                        $beneficiary = new Beneficiary();
                        $insert = 1;
                        $count_inserted++;
                        //$result->set_count_inserted($result->get_count_inserted()++);
                    }
                    else 
                        $count_updated++;
                        //$result->set_count_updated($result->get_count_updated()++);
                    $communitycriteria = new CDbCriteria; 
                    $communitycriteria->addCondition('en_name="'.$objWorksheet->getCellByColumnAndRow(6, $row)->getValue().'"');
                    $community = Community::model()->find($communitycriteria);
                    $beneficiary->registration_code = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $beneficiary->ar_name = ($objWorksheet->getCellByColumnAndRow(1, $row)->getValue()) ? $objWorksheet->getCellByColumnAndRow(1, $row)->getValue() : $beneficiary->ar_name;
                    $beneficiary->en_name = ($objWorksheet->getCellByColumnAndRow(2, $row)->getValue()) ? $objWorksheet->getCellByColumnAndRow(2, $row)->getValue() : $beneficiary->en_name;
                    $beneficiary->family_member = ($objWorksheet->getCellByColumnAndRow(3, $row)->getValue()) ? $objWorksheet->getCellByColumnAndRow(3, $row)->getValue() : $beneficiary->family_member;
                    $beneficiary->main_income_source = ($objWorksheet->getCellByColumnAndRow(4, $row)->getValue()) ? $objWorksheet->getCellByColumnAndRow(4, $row)->getValue() : $beneficiary->main_income_source;
                    $beneficiary->combine_household = ($objWorksheet->getCellByColumnAndRow(5, $row)->getValue()) ? $objWorksheet->getCellByColumnAndRow(5, $row)->getValue() : $beneficiary->combine_household;
                    $beneficiary->phone_number = ($objWorksheet->getCellByColumnAndRow(7, $row)->getValue()) ? $objWorksheet->getCellByColumnAndRow(7, $row)->getValue() : $beneficiary->phone_number;
                    $beneficiary->neighborhood_id = ($objWorksheet->getCellByColumnAndRow(6, $row)->getValue()) ? $community->id : $beneficiary->neighborhood_id;
                    $beneficiary->status_id = $status->id;
                    $beneficiary->save();
                    if ($insert) {
                        array_push($inserted_arr, $beneficiary->registration_code);
                    } else {
                        array_push($updated_arr, $beneficiary->registration_code);
                    }
                }
            } else {
                $result->set_error('No File Selected');
            }
            $result->set_count_inserted($count_inserted);
            $result->set_count_updated($count_updated);
            $result->set_record_inserted($inserted_arr);
            $result->set_record_updated($updated_arr);
            return $this->sendAjaxResponse($result);
        }

}