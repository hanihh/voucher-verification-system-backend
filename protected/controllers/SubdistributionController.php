<?php
Yii::import('application.controllers.BaseController');
class SubdistributionController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Subdistribution'),
		));
	}

	public function actionCreate() {
		$model = new Subdistribution;


		if (isset($_POST['Subdistribution'])) {
			$model->setAttributes($_POST['Subdistribution']);

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
		$model = $this->loadModel($id, 'Subdistribution');


		if (isset($_POST['Subdistribution'])) {
			$model->setAttributes($_POST['Subdistribution']);

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
			$this->loadModel($id, 'Subdistribution')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Subdistribution');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Subdistribution('search');
		$model->unsetAttributes();

		if (isset($_GET['Subdistribution']))
			$model->setAttributes($_GET['Subdistribution']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionPrint($id) {
            $distributionVouchers = DistributionVoucher::model()->findAll("subdistribution_id = :subdistribution_id", array (":subdistribution_id" => $id));
            $criteria = new CDbCriteria;
            $criteria_string = "distribution_voucher_id in (0";
            foreach ($distributionVouchers as $voucher_type) {
                $criteria_string = $criteria_string . ", " . $voucher_type->id;
            }
            $criteria_string = $criteria_string . ")";
            $criteria->addCondition($criteria_string);
            $vouchers = Voucher::model()->findAll($criteria);
            Yii::import('application.controllers.VoucherController');
            $obj = new VoucherController("");
            $html = '';
            foreach ($vouchers as $voucher) {
                $html .= $obj->actionPrint($vouchers[0]->id);
            }
            echo $html;
                
        }

}