<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
 
?>
<div class="application">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file_cvFilename')->fileInput(
        [
            'class' => 'form-control-file',
            'id' => 'cvFilename'
        ]
    )->label('Carregar Ficheiro de Aptidoes | jpg - png - pdf') ?>

    <?= $form->field($model, 'file_qualificationFilename')->fileInput(
        [
            'class' => 'form-control-file',
            'id' => 'qualificationFilename'
        ]
    )->label('Carregar Ficheiro de Curriculo | jpg - png - pdf') ?>

    <?= $form->field($model, 'jobTime') ?>
    <?= $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-app bg-success',
            'class' => 'btn btn-app bg-success',  'data' => [
                'confirm' => 'Tem certeza de que deseja salvar este item?',
                'method' => 'post',
            ]
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>