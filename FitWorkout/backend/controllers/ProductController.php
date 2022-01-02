<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use common\models\Product;
use common\models\UploadForm;
use common\models\ProductSearch;

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
		\Yii::getAlias('@common') .
			$path = '/uploads/products/';
		// var_dump($path);
		// die();
		if ($model->load(\Yii::$app->request->post())) {

			$model->file = UploadedFile::getInstance($model, 'file');
			$model->file->saveAS('@common' . $path . $model->name . '.' . $model->file->extension);
			$model->imageFileName = $model->name . '.' . $model->file->extension;

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
		$model->scenario = 'update';
		$imgName = '@common/uploads/products/' . $model->name;

		if ($model->load(\Yii::$app->request->post())) {

			$model->file = UploadedFile::getInstance($model, 'file');
			if ($model->file == "" || $model->file == null)
				$model->imageFileName = "NoFile";
			else {
				$model->file->saveAs($imgName . '.' . $model->file->extension);
				$model->imageFileName = $imgName . '.' . $model->file->extension;
			}
			$model->save(false);
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
