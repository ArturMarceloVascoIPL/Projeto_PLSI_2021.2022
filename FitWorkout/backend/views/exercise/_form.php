<?php

use common\models\Exercisecategory;
use common\models\Exercisetype;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$tipos = ArrayHelper::map(Exercisetype::find()->all(), 'id', 'name');
$categorias = ArrayHelper::map(Exercisecategory::find()->all(), 'id', 'name');
?>

<div class="exercise-form">
    <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info mb-4']) ?>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'style' => 'width:300px;'],
    ]); ?>

    <!-- Nome do Exercício -->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- Descrição do Exercício -->
    <?= $form->field($model, 'description')->textarea(['rows' => '3', 'maxlength' => true, 'style' => ' resize: none'])->label('Descrição') ?>

    <!-- Definir Aprovação -->
    <?php if ((Yii::$app->user->can('admin'))) { ?>
        <?= $form->field($model, 'approved')->dropDownList(
            [0 => 'Não Aprovado', 1 => 'Aprovado'],
            ['options' => ['approved' => ['selected' => true]]]
        )->label('Aprovação de Exercício') ?>

    <?php } ?>

    <!-- Tipo de Exercicio -->
    <?= $form->field($model, 'typeId')->dropDownList(
        $tipos,
        ['options' => ['typeId' => ['selected' => true]]]
    )->label('Tipo de Exercício') ?>

    <!-- Categoria do Exercicio -->
    <?= $form->field($model, 'categoryId')->dropDownList(
        $categorias,
        ['options' => ['categoryId' => ['selected' => true]]]
    )->label('Categoria de Exercicio'); ?>

    <!-- Submeter -->
    <div class="form-group">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Salvar',
            [
                'class' => 'btn btn-app bg-success',
                'data' => [
                    'confirm' => 'Tem certeza de que deseja salvar este item?',
                    'method' => 'post',
                ]
            ]
        )
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>