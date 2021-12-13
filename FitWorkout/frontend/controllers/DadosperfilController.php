<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Client;
use common\models\User;

class DadosperfilController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $model = Client::findOne($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect('/site/index');
        }

        return $this->render('index', [
            'model' => $model,
        ]);

        // return $this->render('index');
    }
}
