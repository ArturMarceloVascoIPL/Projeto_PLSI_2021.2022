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

class ProductcategoryController extends ActiveController
{
    public $modelClass = 'common\models\Productcategory';

    public function actionTotal()
    {
        $climodel = new $this->modelClass;
        $recs = $climodel::find()->all();
        return ['total' => count($recs)];
    }
}
