<?php

namespace frontend\controllers;

use common\models\User;
use common\models\Userdata;
use common\models\Userprofile;
use yii;
use yii\base\Model;
use yii\web\Controller;

class DadosperfilController extends Controller
{
    public function actionIndex($id)
    {
        $modelUser = User::findOne($id);
        $modelProfile = Userprofile::findOne($id);
        $modelData = Userdata::findOne($id);

        if ($modelProfile->load(Yii::$app->request->post()) && $modelUser->load(Yii::$app->request->post()) && Model::validateMultiple([$modelProfile, $modelUser])) {
            $modelUser->save();
            $modelProfile->save();
            $modelData->save();
            return $this->redirect(['/dadosperfil', 'id' => $id]);
        }

        return $this->render('index', [
            'modelUser' => $modelUser,
            'modelProfile' => $modelProfile,
            'modelData' => $modelData
        ]);
    }
}
