<?php

namespace backend\controllers;

use common\models\Workout;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Exercise;
use common\models\Exercisecategory;
use common\models\Exercisetype;
use common\models\Workoutexercise;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * WorkoutController implements the CRUD actions for Workout model.
 */
class WorkoutController extends Controller
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
                'acess' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [

                            'allow' => true,
                            'actions' => ['index', 'view', 'create', 'update', 'delete', 'logout', 'error', 'exercisesadd', 'addexercise'],
                            'roles' => ['admin', 'personalTrainer'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index', 'view', 'logout', 'error'],
                            'roles' => ['?'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Workout models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('admin')) {

            $dataProvider = new ActiveDataProvider([
                'query' => Workout::find(),
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

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else if (\Yii::$app->user->can('personalTrainer')) {
            $dataProvider = new ActiveDataProvider([
                'query' => Workout::find()->where(['ptId' => \Yii::$app->user->id]),
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

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Workout model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $exerciseWorkoutList =  Workoutexercise::find()->where(['workoutId' => $id])->all();
        $exerciseList = [];
        foreach ($exerciseWorkoutList as $exerciseWorkout) {
            $exerciseList[] = $exerciseWorkout->exerciseId;
        }

        $exerciseModel = Exercise::find()->where(['id' => $exerciseList])->all();


        return $this->render('view', [
            'model' => $this->findModel($id),
            'exerciseModel' => $exerciseModel,
        ]);
    }

    /**
     * Creates a new Workout model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Workout();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->ptId = \Yii::$app->user->id;

                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Workout model.
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

    public function actionExercisesadd($id)
    {
        $model = new Workoutexercise();

        if ($this->request->post()) {

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('exercisesadd', [
            'model' => $model,
            'workoutModel' => $this->findModel($id),
            "exerciseList" => Exercise::find()->all(),
        ]);
    }

    public function actionAddexercise()
    {
        $model = new Workoutexercise();

        $model->exerciseId = \Yii::$app->request->post('exerciseId', null);;
        $model->workoutId = \Yii::$app->request->post('workoutId', null);;
        $model->exerciseCalories = 10;
        $model->equipmentWeight = 10;
        $model->seriesSize = 3;
        $model->seriesNum = 2;
        $model->restTime = 10;

        if ($model->save()) {
            return $this->redirect(['/workout']);
        }
    }

    /**
     * Finds the Workout model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Workout the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Workout::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
