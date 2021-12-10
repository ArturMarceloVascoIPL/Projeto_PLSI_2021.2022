<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="exercisetype-form">
    <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info mb-4']) ?>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'style' => 'width:300px;'],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nome') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '3', 'maxlength' => true, 'style' => ' resize: none'])->label('Descrição') ?>

    <!-- Submeter -->
    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Salvar', [
            'class' => 'btn btn-app bg-success',
            'class' => 'btn btn-app bg-success',  'data' => [
                'confirm' => 'Tem certeza de que deseja salvar este item?',
                'method' => 'post',
            ]
        ])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>