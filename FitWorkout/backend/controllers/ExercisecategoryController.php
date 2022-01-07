<?php

namespace backend\controllers;

use common\models\Exercisecategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('readExerciseCategory')) {
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
        // }

        // return 0;
    }

    public function actionView($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('readExerciseCategory')) {
            return $this->render('/exercise/exercisecategory/view', [
                'model' => $this->findModel($id),
            ]);
        // }

        // return 0;
    }

    protected function findModel($id)
    {
        if (($model = Exercisecategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('createExerciseCategory')) {
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
        // }

        // return 0;
    }

    public function actionUpdate($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('updateExerciseCategory')) {
            $model = $this->findModel($id);
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('/exercise/exercisecategory/update', [
                'model' => $model,
            ]);
        // }

        // return 0;
    }

    public function actionDelete($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('deleteExerciseCategory')) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        // }

        // return 0;
    }

    public function actionMainindex()
    {
        return $this->redirect(['exercise/index']);
    }
}
