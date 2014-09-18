<?php

Yii::import('application.controllers.BaseController');

class DistrictController extends BaseController {

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'District'),
        ));
    }

    public function actionCreate() {
        $model = new District;


        if (isset($_POST['District'])) {
            $model->setAttributes($_POST['District']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'District');


        if (isset($_POST['District'])) {
            $model->setAttributes($_POST['District']);

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
            $this->loadModel($id, 'District')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('District');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new District('search');
        $model->unsetAttributes();

        if (isset($_GET['District']))
            $model->setAttributes($_GET['District']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionDynamicdistricts() {
        /* if (isset($_GET['governorate_id']) && !empty($_GET['governorate_id'])) {
          $data=  District::model()->findAll('governerate_id=:governorate_id',
          array(':governorate_id'=>(int) $_GET['governorate_id']));
          } else {
          $data=  District::model()->findAll();
          }

          header('Content-type: application/json', true, 200);
          echo CJSON::encode($data, 'id', 'code', 'en_name', 'ar_name');
          Yii::app()->end();
         * 
         */
        /* $data=CHtml::listData($data,'id','en_name');
          echo CHtml::tag('option',
          array('value'=>0),"-- Select One --",true);
          foreach($data as $value=>$name)
          {
          echo CHtml::tag('option',
          array('value'=>$value),CHtml::encode($name),true);
          } */
    }

}
