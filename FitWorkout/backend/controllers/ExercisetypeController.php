<?php

namespace backend\controllers;

use common\models\Exercisetype;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExercisetypeController implements the CRUD actions for Exercisetype model.
 */
class ExercisetypeController extends Controller
{
    /** 
     * @inheritDoc 
     */
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

    /** 
     * Lists all Exercisetype models. 
     * @return mixed 
     */
    public function actionIndex()
    {
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
    /** 
     * Displays a single Exercisetype model. 
     * @param int $id ID 
     * @return mixed 
     * @throws NotFoundHttpException if the model cannot be found 
     */
    public function actionView($id)
    {
        return $this->render('/exercise/exercisetype/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /** 
     * Creates a new Exercisetype model. 
     * If creation is successful, the browser will be redirected to the 'view' page. 
     * @return mixed 
     */
    public function actionCreate()
    {
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
    }

    /** 
     * Updates an existing Exercisetype model. 
     * If update is successful, the browser will be redirected to the 'view' page. 
     * @param int $id ID 
     * @return mixed 
     * @throws NotFoundHttpException if the model cannot be found 
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('/exercise/exercisetype/update', [
            'model' => $model,
        ]);
    }

    /** 
     * Deletes an existing Exercisetype model. 
     * If deletion is successful, the browser will be redirected to the 'index' page. 
     * @param int $id ID 
     * @return mixed 
     * @throws NotFoundHttpException if the model cannot be found 
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionMainindex()
    {
        return $this->redirect(['@app\views\exercise\index']);
    }
    /** 
     * Finds the Exercisetype model based on its primary key value. 
     * If the model is not found, a 404 HTTP exception will be thrown. 
     * @param int $id ID 
     * @return Exercisetype the loaded model 
     * @throws NotFoundHttpException if the model cannot be found 
     */
    protected function findModel($id)
    {
        if (($model = Exercisetype::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
