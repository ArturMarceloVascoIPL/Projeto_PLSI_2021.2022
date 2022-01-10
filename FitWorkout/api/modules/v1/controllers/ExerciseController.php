<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\web\HttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use  yii\filters\auth\HttpBasicAuth;

class ExerciseController extends ActiveController
{
    public $modelClass = 'common\models\Exercise';

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
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }
}
