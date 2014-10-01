<?php

Yii::import('application.controllers.BaseController');

class DonorController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Donor'),
		));
	}

	public function actionCreate() {
		$model = new Donor;


		if (isset($_POST['Donor'])) {
			$model->setAttributes($_POST['Donor']);

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
		$model = $this->loadModel($id, 'Donor');


		if (isset($_POST['Donor'])) {
			$model->setAttributes($_POST['Donor']);

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
			$this->loadModel($id, 'Donor')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Donor');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Donor('search');
		$model->unsetAttributes();

		if (isset($_GET['Donor']))
			$model->setAttributes($_GET['Donor']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}