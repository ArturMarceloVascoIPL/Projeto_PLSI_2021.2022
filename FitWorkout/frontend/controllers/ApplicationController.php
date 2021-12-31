<?php

namespace frontend\controllers;

use \common\models\Ptapplication;
use yii\web\UploadedFile;

class ApplicationController extends \yii\web\Controller
{
	// $path = 'uploads/ptApp/' . $model->userId . '/' .'
	public function actionIndex()
	{
		$userIdLogged = \Yii::$app->user->id;

		$model_temp = Ptapplication::findOne(['userId' => $userIdLogged]);

		if (!$model_temp) {
			if ($this->request->isPost) {
				$model = new Ptapplication;
				$model->load($this->request->post());

				$model->userId = $userIdLogged;
				$model->approved = 0;

				$model->file_qualificationFilename = UploadedFile::getInstance($model, 'file_qualificationFilename');
				$model->file_qualificationFilename->saveAS('uploads/ptApp/' . $model->userId . '-qualificacoes.' . $model->file_qualificationFilename->extension);
				$model->qualificationFilename = 'uploads/ptApp/' . $model->userId . '-qualificacoes.' . $model->file_qualificationFilename->extension;

				$model->file_cvFilename = UploadedFile::getInstance($model, 'file_cvFilename');
				$model->file_cvFilename->saveAS('uploads/ptCv/' . $model->userId . '-curriculo.' . $model->file_cvFilename->extension);
				$model->cvFilename = 'uploads/ptCv/' . $model->userId . '-curriculo.' . $model->file_cvFilename->extension;

				$model->save(false);
			}
		}
		return $this->render('index');
	}
}
