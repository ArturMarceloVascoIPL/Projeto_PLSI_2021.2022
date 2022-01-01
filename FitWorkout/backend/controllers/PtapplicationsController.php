<?php

namespace backend\controllers;

use common\models\Ptapplication;
use yii\data\ActiveDataProvider;

class PtapplicationsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Ptapplication::find(),

        ]);
        return $this->render('/user/ptapplications/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('/user/ptapplications/view', [
            'model' => Ptapplication::findOne($id),
        ]);
    }

    public function actionApprove($id)
    {
        $model = Ptapplication::findOne($id);
        $model->approved = 1;

        $userId = $model->userId;
     
        $manager = \Yii::$app->authManager;
        $item = $manager->getRole('client');
        $item = $item ?: $manager->getPermission('client');
        $manager->revoke($item, $userId);

        $authorRole = $manager->getRole('personaltrainer');
        $manager->assign($authorRole, $userId);

        $model->save();
        return $this->redirect(['index']);
    }

    public function actionMainindex()
    {
        return $this->redirect(['/user']);
    }
}
