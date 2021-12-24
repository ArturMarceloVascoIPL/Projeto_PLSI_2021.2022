<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Productcategory;

$categorias = ArrayHelper::map(Productcategory::find()->all(), 'id', 'name');
?>

<div class="product-form">
    <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info mb-4']) ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= Html::img('@web/' . $model->imageFileName, ['class' => 'img-thumbnail', 'style' => 'width: 200px;']) ?>
    <?= $form->field($model, 'file')->fileInput(
        [
            'class' => 'form-control-file',
            'id' => 'file'
        ]
    )->label('Carregar Imagem') ?>

    <!-- Categoria do Produto -->
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