<?php
Yii::import('application.controllers.BaseController');
class VendorStatusController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VendorStatus'),
		));
	}

	public function actionCreate() {
		$model = new VendorStatus;


		if (isset($_POST['VendorStatus'])) {
			$model->setAttributes($_POST['VendorStatus']);

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
		$model = $this->loadModel($id, 'VendorStatus');


		if (isset($_POST['VendorStatus'])) {
			$model->setAttributes($_POST['VendorStatus']);

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
			$this->loadModel($id, 'VendorStatus')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VendorStatus');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VendorStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['VendorStatus']))
			$model->setAttributes($_GET['VendorStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}