<?php

namespace backend\controllers;

use common\models\Exercisecategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExercisecategoryController implements the CRUD actions for Exercisecategory model.
 */
class ExercisecategoryController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Exercisecategory::find(),
            /*
           'pagination' => [
               'pageSize' => 50
           ],
           'sort' => [
               'defaultOrder' => [
                   'id' => SORT_DESC,
               ]
           ],
           */
        ]);
        return $this->render('/exercise/exercisecategory/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('/exercise/exercisecategory/view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Exercisecategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/exercise/exercisecategory/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('/exercise/exercisecategory/update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionMainindex()
    {
        return $this->redirect(['exercise/index']);
    }

    protected function findModel($id)
    {
        if (($model = Exercisecategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
