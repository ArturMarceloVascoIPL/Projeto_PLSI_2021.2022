<?php

namespace api\modules\v1\controllers;

use yii\web\Controller;
use  yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;


/**
 * Default controller for the `v1` module
 */
class DefaultController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\User';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            // 'class' => HttpBasicAuth::className(),
            // 'auth' => [$this, 'auth']
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }

    // public function auth($username, $password)
    // {
    //     $user = \common\models\User::findByUsername($username);
    //     if ($user && $user->validatePassword($password)) {
    //         return $user;
    //     }
    // }
}
