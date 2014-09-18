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

        public function actionDynamiccities()
        {
            /*if (isset($_GET['country_id']) && !empty($_GET['country_id'])) {
                $data=  Governorate::model()->findAll('country_id=:country_id', 
                          array(':country_id'=>(int) $_POST['country_id']));
            } else {
                $data=  Governorate::model()->findAll();
            }
            header('Content-type: application/json', true, 200);
            echo CJSON::encode($data, 'id', 'code','en_name', 'ar_name');
            Yii::app()->end();  
             * 
             */
            /*$data=CHtml::listData($data,'id','en_name');
            echo CHtml::tag('option',
                           array('value'=>0),"-- Select One --",true);
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                           array('value'=>$value),CHtml::encode($name),true);
            }*/
        }
}