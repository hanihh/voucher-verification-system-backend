<?php
Yii::import('application.controllers.BaseController');
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

		$this->render('create', array( 'model' => $model));
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

}