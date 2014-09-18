<?php
Yii::import('application.controllers.BaseController');
class CommunityController extends BaseController {

        
        
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Community'),
		));
	}

	public function actionCreate() {
		$model = new Community;


		if (isset($_POST['Community'])) {
			$model->setAttributes($_POST['Community']);

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
		$model = $this->loadModel($id, 'Community');


		if (isset($_POST['Community'])) {
			$model->setAttributes($_POST['Community']);

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
			$this->loadModel($id, 'Community')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Community');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Community('search');
		$model->unsetAttributes();

		if (isset($_GET['Community']))
			$model->setAttributes($_GET['Community']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionDynamiccommunities()
        {
            /*if (isset($_GET['subdistrict_id']) && !empty($_GET['subdistrict_id'])) {
                $data= Community::model()->findAll('subdistrict_id=:subdistrict_id', 
                          array(':subdistrict_id'=>(int) $_GET['subdistrict_id']));
            } else {
                $data= Community::model()->findAll();
            }
            header('Content-type: application/json', true, 200);
            echo CJSON::encode($data, 'id', 'code', 'en_name', 'ar_name');
            Yii::app()->end();
             * 
             */
            //print_r($data);
            //$this->sendAjaxResponse($data);
            //$data=CHtml::listData($data,'id','en_name');
            //echo CHtml::tag('option',
            //               array('value'=>0),"-- Select One --",true);
            //foreach($data as $value=>$name)
            //{
            //    echo CHtml::tag('option',
            //               array('value'=>$value),CHtml::encode($name),true);
            //}
        }
}