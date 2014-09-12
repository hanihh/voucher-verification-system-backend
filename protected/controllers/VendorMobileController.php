<?php
Yii::import('application.controllers.BaseController');
class VendorMobileController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VendorMobile'),
		));
	}

	public function actionCreate() {
		$model = new VendorMobile;


		if (isset($_POST['VendorMobile'])) {
			$model->setAttributes($_POST['VendorMobile']);

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
		$model = $this->loadModel($id, 'VendorMobile');


		if (isset($_POST['VendorMobile'])) {
			$model->setAttributes($_POST['VendorMobile']);

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
			$this->loadModel($id, 'VendorMobile')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VendorMobile');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VendorMobile('search');
		$model->unsetAttributes();

		if (isset($_GET['VendorMobile']))
			$model->setAttributes($_GET['VendorMobile']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}