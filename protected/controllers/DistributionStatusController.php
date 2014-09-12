<?php
Yii::import('application.controllers.BaseController');
class DistributionStatusController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DistributionStatus'),
		));
	}

	public function actionCreate() {
		$model = new DistributionStatus;


		if (isset($_POST['DistributionStatus'])) {
			$model->setAttributes($_POST['DistributionStatus']);

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
		$model = $this->loadModel($id, 'DistributionStatus');


		if (isset($_POST['DistributionStatus'])) {
			$model->setAttributes($_POST['DistributionStatus']);

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
			$this->loadModel($id, 'DistributionStatus')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DistributionStatus');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DistributionStatus('search');
		$model->unsetAttributes();

		if (isset($_GET['DistributionStatus']))
			$model->setAttributes($_GET['DistributionStatus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}