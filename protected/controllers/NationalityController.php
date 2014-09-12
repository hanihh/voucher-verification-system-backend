<?php
Yii::import('application.controllers.BaseController');
class NationalityController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Nationality'),
		));
	}

	public function actionCreate() {
		$model = new Nationality;


		if (isset($_POST['Nationality'])) {
			$model->setAttributes($_POST['Nationality']);

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
		$model = $this->loadModel($id, 'Nationality');


		if (isset($_POST['Nationality'])) {
			$model->setAttributes($_POST['Nationality']);

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
			$this->loadModel($id, 'Nationality')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Nationality');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Nationality('search');
		$model->unsetAttributes();

		if (isset($_GET['Nationality']))
			$model->setAttributes($_GET['Nationality']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}