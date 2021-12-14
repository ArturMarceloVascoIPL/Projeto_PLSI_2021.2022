<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use common\models\Product;
use common\models\UploadForm;
use app\models\ProductSearch;

class ProductController extends Controller
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
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {

            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAS('uploads/' . $model->file->name);
            $model->image = 'uploads/' . $model->file->name;

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post())) {

            if ($this->IsNullOrEmptyString($model->file)) {
                if(file_exists(\Yii::$app->basePath . '/web/' . $model->image)){
                    unlink(\Yii::$app->basePath . '/web/' . $model->image);
                }
                $model->image = 'NoImage';
            }
            else{
                $imageFile = \Yii::$app->basePath . '/web/' . $model->image;
                unlink($imageFile);
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAS('uploads/' . $model->file->name);
                $model->image = 'uploads/' . $model->file->name;
            }

            // if (!file_exists('uploads/' . $model->file->name)) {
            //     $model->file = UploadedFile::getInstance($model, 'file');
            //     $model->file->saveAS('uploads/' . $model->file->name);
            //     $model->image = 'uploads/' . $model->file->name;
            // }

            // $imagePath = \Yii::$app->basePath . '/web/' . $model->file;

            // if ($imagePath == null) {
            //     // unlink();
            //     $model->file = UploadedFile::getInstance($model, 'file');
            //     $model->file->saveAS('uploads/' . $model->file->name);
            //     $model->image = 'NoImage';
            // } else {
            //     // if (file_exists($imagePath)) {
            //     //     unlink($imagePath);
            //     // }
            //     $model->file = UploadedFile::getInstance($model, 'file');
            //     $model->file->saveAS('uploads/' . $model->file->name);
            //     $model->image = 'uploads/' . $model->file->name;
            // }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function IsNullOrEmptyString($str)
    {
        return (!isset($str) || trim($str) === '');
    }
}
