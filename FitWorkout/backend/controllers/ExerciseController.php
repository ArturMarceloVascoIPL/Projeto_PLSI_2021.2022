<?php

namespace backend\controllers;

use backend\models\ExerciseSearch;
use common\models\Exercise;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ExerciseController implements the CRUD actions for Exercise model.
 */
class ExerciseController extends Controller
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
                            'actions' => ['index', 'logout', 'error'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['create', 'view', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view', 'create'],
                            'roles' => ['personalTrainer']
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Exercise models.
     * @return mixed
     */
    public function actionIndex()
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('readExercises')) {
            $searchModel = new ExerciseSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        return 0;
    }

    public function actionView($id)
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('readExercises')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        return 0;
    }

    protected function findModel($id)
    {
        if (($model = Exercise::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('createExercise')) {
            $model = new Exercise();

            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    if (Yii::$app->user->can('personalTrainer')) {
                        $model->approved = 0;
                    }
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

        return 0;
    }

    public function actionUpdate($id)
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('updateExercises')) {
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

        return 0;
    }

    public function actionDelete($id)
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('deleteExercises')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

        return 0;
    }
}
