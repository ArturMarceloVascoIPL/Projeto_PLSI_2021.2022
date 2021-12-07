<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Exercisetype;
use common\models\Exercisecategory;

$tipos = ArrayHelper::map(Exercisetype::find()->all(), 'id', 'name');
$categorias = ArrayHelper::map(Exercisecategory::find()->all(), 'id', 'name');
?>

<div class="exercise-form">
    <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info mb-4']) ?>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'style' => 'width:300px;'],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Nome') ?>

    <!-- https://stackoverflow.com/questions/27945401/yii2-how-to-add-textarea-in-yii2 -->
    <?= $form->field($model, 'description')->textarea(['rows' => '3', 'maxlength' => true, 'style' => ' resize: none'])->label('Descrição') ?>

    <?= $form->field($model, 'caloriesBurned')->textInput()->label('Calorias (Kcal)') ?>

    <!-- Tipo de Exercicio -->
    <?= $form->field($model, 'type')->dropDownList(
        $tipos,
        ['options' => ['type' => ['selected' => true]]]
    )->label('Tipo de Exercício') ?>

    <!-- Categoria do Exercicio -->
    <?= $form->field($model, 'categoryId')->dropDownList(
        $categorias,
        ['options' => ['categoryId' => ['selected' => true]]]
    )->label('Categoria de Exercicio'); ?>

    <div class="form-group">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Salvar',
            [
                'class' => 'btn btn-app bg-success',
                'class' => 'btn btn-app bg-success',  'data' => [
                    'confirm' => 'Tem certeza de que deseja salvar este item?',
                    'method' => 'post',
                ]
            ]
        )
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>