<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Client;
use common\models\User;
use yii;
use yii\base\Model;

class DadosperfilController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $modelclient = Client::findOne($id);
        $modeluser = User::findOne($id);

        


        if ($modelclient->load(Yii::$app->request->post()) && $modeluser->load(Yii::$app->request->post()) && Model::validateMultiple([$modelclient, $modeluser])) {
            $modelclient->save(false);
            $modeluser->save(false);
            return $this->redirect(['/dadosperfil','id' => $id]);
        }

    
        
        
        

        return $this->render('index', [
            'modelclient' => $modelclient,
            'modeluser' => $modeluser,
        ]);

        // return $this->render('index');
    }
}
