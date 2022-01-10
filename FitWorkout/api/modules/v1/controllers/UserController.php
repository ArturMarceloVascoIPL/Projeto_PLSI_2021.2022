<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
            // 'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        var_dump($username);
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
    }

    public function actionTotal()
    {
        $total = new $this->modelClass;
        $recs = $total::find()->all();
        return ['total' => count($recs)];
    }

    public function actionPtlist()
    {
        $users = User::find('id')->all();
        $personaltrainers = array();

        foreach ($users as $user) {
            if ($user->getRoleName() == "personalTrainer") {
                array_push($personaltrainers, $user);
            }
        }
        // return  ['id' => $id, 'email' => "null"]; 
        return $personaltrainers;
    }

    public function actionEmail($id)
    {
        $climodel = new $this->modelClass;
        $rec = $climodel::find()->where("id=" . $id)->one();
        if ($rec)
            return ['id' => $id, 'email' => $rec->email];
        return ['id' => $id, 'email' => "null"];
    }
}
