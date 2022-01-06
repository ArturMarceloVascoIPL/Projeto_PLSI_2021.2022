<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-form">
    <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info mb-4']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateStart')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ]
    ); ?>
    <?= $form->field($model, 'dateEnd')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>