<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class SettingsController extends \yii\web\Controller
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
                'acess' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [

                            'allow' => true,
                            'actions' => ['index', 'view', 'create', 'update', 'delete', 'logout', 'error', 'exercisesadd', 'addexercise'],
                            'roles' => ['personalTrainer'],
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
    public function actionIndex()
    {
        return $this->render('index');
    }

}
