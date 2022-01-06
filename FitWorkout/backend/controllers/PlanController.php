<?php

namespace backend\controllers;

use common\models\Plan;
use common\models\Planworkout;
use common\models\Workout;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends Controller
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
                            'actions' => ['login', 'error'],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                        [
                            #TODO ver o que fazer com o acesso aos usuários logados (permissoess e vistas)
                            'actions' => ['index', 'logout', 'error', 'view', 'create', 'update', 'delete', 'addtreinos', 'addtreino'],
                            'allow' => true,
                            'roles' => ['personalTrainer'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Plan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Plan::find(),
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

    /**
     * Displays a single Plan model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $workoutPlanList =  Planworkout::find()->where(['planId' => $id])->all();
        $workoutList = [];
        foreach ($workoutPlanList as $workouts) {
            $workoutList[] = $workouts->workoutId;
        }

        $workoutModel = Workout::find()->where(['id' => $workoutList])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'workoutModel' => $workoutModel,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Plan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->ptPlan =  \Yii::$app->user->identity->id;
                $model->userId = \Yii::$app->user->identity->id;
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

    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
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
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionAddtreinos($id)
    {
        $model = new Planworkout();

        if ($this->request->post()) {

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('addtreinos', [
            'model' => $model,
            'planPt' => $this->findModel($id),
            'workoutsPt' => Workout::find()->where(['ptId' => \Yii::$app->user->identity->id])->all(),
        ]);
    }

    public function actionAddtreino()
    {
        $model = new Planworkout();

        $model->planId = \Yii::$app->request->post('planId', null);;
        $model->workoutId = \Yii::$app->request->post('workoutId', null);;

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->planId]);
        }

        return $this->render('addtreinos', [
            'model' => $model,
            'workoutsPt' => Workout::find()->where(['ptId' => \Yii::$app->user->identity->id])->all(),
        ]);
    }

    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
