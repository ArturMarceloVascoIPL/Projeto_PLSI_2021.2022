<?php

namespace backend\controllers;

use common\models\Ptapplication;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PtapplicationsController extends Controller
{
    public function actionIndex()
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('readPTApplication')) {
            $dataProvider = new ActiveDataProvider([
                'query' => Ptapplication::find(),

            ]);
            return $this->render('/user/ptapplications/index', [
                'dataProvider' => $dataProvider,
            ]);
        // }

        // return 0;
    }

    public function actionView($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('readPTApplication')) {
            return $this->render('/user/ptapplications/view', [
                'model' => Ptapplication::findOne($id),
            ]);
        // }

        // return 0;
    }

    public function actionApprove($id)
    {
        /** Verificar permissão do utilizador */
        // if (Yii::$app->user->can('updatePTApplication')) {
            $model = Ptapplication::findOne($id);
            $model->approved = 1;
            $userId = $model->userId;
            $manager = Yii::$app->authManager;
            $item = $manager->getRole('client');
            $item = $item ?: $manager->getPermission('client');
            $manager->revoke($item, $userId);
            $authorRole = $manager->getRole('personaltrainer');
            $manager->assign($authorRole, $userId);
            $model->save();
            return $this->redirect(['index']);
        // }

        // return 0;
    }

    public function actionMainindex()
    {
        return $this->redirect(['/user']);
    }
}
