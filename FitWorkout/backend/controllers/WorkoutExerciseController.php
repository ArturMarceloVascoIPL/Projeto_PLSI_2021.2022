<?php

namespace backend\controllers;

use common\models\WorkoutExercise;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class WorkoutExerciseController extends Controller
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
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all WorkoutExercise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WorkoutExercise::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'exerciseId' => SORT_DESC,
                    'workoutId' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('/workout/workoutexercise/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkoutExercise model.
     * @param int $exerciseId ID do Exercício
     * @param int $workoutId ID do Treino
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($exerciseId, $workoutId)
    {
        return $this->render('view', [
            'model' => $this->findModel($exerciseId, $workoutId),
        ]);
    }

    /**
     * Creates a new WorkoutExercise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WorkoutExercise();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'exerciseId' => $model->exerciseId, 'workoutId' => $model->workoutId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WorkoutExercise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $exerciseId ID do Exercício
     * @param int $workoutId ID do Treino
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($exerciseId, $workoutId)
    {
        $model = $this->findModel($exerciseId, $workoutId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'exerciseId' => $model->exerciseId, 'workoutId' => $model->workoutId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WorkoutExercise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $exerciseId ID do Exercício
     * @param int $workoutId ID do Treino
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($exerciseId, $workoutId)
    {
        $this->findModel($exerciseId, $workoutId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WorkoutExercise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $exerciseId ID do Exercício
     * @param int $workoutId ID do Treino
     * @return WorkoutExercise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($exerciseId, $workoutId)
    {
        if (($model = WorkoutExercise::findOne(['exerciseId' => $exerciseId, 'workoutId' => $workoutId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
