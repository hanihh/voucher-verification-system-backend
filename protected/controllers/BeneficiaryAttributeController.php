<?php
Yii::import('application.controllers.BaseController');
class BeneficiaryAttributeController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BeneficiaryAttribute'),
		));
	}

	public function actionCreate() {
		$model = new BeneficiaryAttribute;


		if (isset($_POST['BeneficiaryAttribute'])) {
			$model->setAttributes($_POST['BeneficiaryAttribute']);

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
		$model = $this->loadModel($id, 'BeneficiaryAttribute');


		if (isset($_POST['BeneficiaryAttribute'])) {
			$model->setAttributes($_POST['BeneficiaryAttribute']);

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
			$this->loadModel($id, 'BeneficiaryAttribute')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BeneficiaryAttribute');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BeneficiaryAttribute('search');
		$model->unsetAttributes();

		if (isset($_GET['BeneficiaryAttribute']))
			$model->setAttributes($_GET['BeneficiaryAttribute']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}