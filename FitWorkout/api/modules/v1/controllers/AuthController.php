<?php

namespace api\modules\v1\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\web\HttpException;
use yii\web\Response;

class AuthController extends Controller
{

    public function behaviors()
    {
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }

    public function actionLogin()
    {
        if ($post = \Yii::$app->request->post()) {
            if ((isset($post["username"]) && isset($post["password"])) != null) {
                $user = User::findByUsername($post["username"]);

                if ($user->id && $user->validatePassword($post["password"])) {
                    return [
                        "id" => $user->id,
                        "username" => $user->username,
                        "auth_key" => $user->getAuthKey(),
                        "success" => true,
                    ];
                }
            }
        }

        $response = [
            'username' => 'username',
            'password' => 'password',
        ];

        return $response;
    }
}
