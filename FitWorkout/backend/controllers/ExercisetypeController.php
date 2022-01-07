<?php

namespace backend\controllers;

use common\models\Exercisetype;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ExercisetypeController implements the CRUD actions for Exercisetype model.
 */
class ExercisetypeController extends Controller
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
        // if (Yii::$app->user->can('readExerciseType')) {
            $dataProvider = new ActiveDataProvider([
                'query' => Exercisetype::find(),
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
            return $this->render('/exercise/exercisetype/index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        // return 0;
    }

    public function actionView($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('readExerciseType')) {
            return $this->render('/exercise/exercisetype/view', [
                'model' => $this->findModel($id),
            ]);
        // }

        // return 0;
    }

    protected function findModel($id)
    {
        if (($model = Exercisetype::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('createExerciseType')) {
            $model = new Exercisetype();
            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }
            return $this->render('/exercise/exercisetype/create', [
                'model' => $model,
            ]);
        // }

        // return 0;
    }

    public function actionUpdate($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('updateExerciseType')) {
            $model = $this->findModel($id);
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('/exercise/exercisetype/update', [
                'model' => $model,
            ]);
        // }

        // return 0;
    }

    public function actionDelete($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('deleteExerciseType')) {
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
