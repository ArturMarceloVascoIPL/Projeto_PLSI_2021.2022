<?php

namespace backend\controllers;

use common\models\Productcategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductcategoryController implements the CRUD actions for Productcategory model.
 */
class ProductcategoryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('readProductCategory')) {
            $dataProvider = new ActiveDataProvider([
                'query' => Productcategory::find(),
                /*
                'pagination' => [
                    'pageSize' => 50
                ],
                'sort' => [
                    'defaultOrder' => [
                        'id' => SORT_DESC,
                    ]
                ],
                */
            ]);
            return $this->render('/product/productcategory/index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        return 0;
    }

    public function actionView($id)
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('readProductCategory')) {
            return $this->render('/product/productcategory/view', [
                'model' => $this->findModel($id),
            ]);
        }

        return 0;
    }

    protected function findModel($id)
    {
        if (($model = Productcategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('createProductCategory')) {
            $model = new Productcategory();
            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }
            return $this->render('/product/productcategory/create', [
                'model' => $model,
            ]);
        }

        return 0;
    }

    public function actionUpdate($id)
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('updateProductCategory')) {
            $model = $this->findModel($id);
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('/product/productcategory/update', [
                'model' => $model,
            ]);
        }

        return 0;
    }

    public function actionDelete($id)
    {
        /** Verificar permissão do utilizador */
        if (Yii::$app->user->can('deleteProductCategory')) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }

        return 0;
    }

    public function actionMainindex()
    {
        return $this->redirect(['product/index']);
    }
}
