<?php

namespace backend\controllers;

use yii\filters\AccessControl;

class ExerciseptController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
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
                        'actions' => ['logout', 'index', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }


    public function actionIndex()
    {
        return $this->render('/ptViews/exercicios/index');
    }
}
