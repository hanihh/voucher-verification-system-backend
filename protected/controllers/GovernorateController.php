<?php
Yii::import('application.controllers.BaseController');
class GovernorateController extends BaseController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Governorate'),
		));
	}

	public function actionCreate() {
		$model = new Governorate;


		if (isset($_POST['Governorate'])) {
			$model->setAttributes($_POST['Governorate']);

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
		$model = $this->loadModel($id, 'Governorate');


		if (isset($_POST['Governorate'])) {
			$model->setAttributes($_POST['Governorate']);

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
			$this->loadModel($id, 'Governorate')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Governorate');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Governorate('search');
		$model->unsetAttributes();

		if (isset($_GET['Governorate']))
			$model->setAttributes($_GET['Governorate']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}