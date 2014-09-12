<?php
Yii::import('application.controllers.BaseController');
class ErrorController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Error'),
		));
	}

	public function actionCreate() {
		$model = new Error;


		if (isset($_POST['Error'])) {
			$model->setAttributes($_POST['Error']);

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
		$model = $this->loadModel($id, 'Error');


		if (isset($_POST['Error'])) {
			$model->setAttributes($_POST['Error']);

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
			$this->loadModel($id, 'Error')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Error');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Error('search');
		$model->unsetAttributes();

		if (isset($_GET['Error']))
			$model->setAttributes($_GET['Error']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}