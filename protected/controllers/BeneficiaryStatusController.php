<?php
Yii::import('application.controllers.BaseController');
class BeneficiaryStatusController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BeneficiaryStatus'),
		));
	}

	public function actionCreate() {
		$model = new BeneficiaryStatus;


		if (isset($_POST['BeneficiaryStatus'])) {
			$model->setAttributes($_POST['BeneficiaryStatus']);

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
		$model = $this->loadModel($id, 'BeneficiaryStatus');


		if (isset($_POST['BeneficiaryStatus'])) {
			$model->setAttributes($_POST['BeneficiaryStatus']);

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
			$this->loadModel($id, 'BeneficiaryStatus')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BeneficiaryStatus');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BeneficiaryStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['BeneficiaryStatus']))
			$model->setAttributes($_GET['BeneficiaryStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}