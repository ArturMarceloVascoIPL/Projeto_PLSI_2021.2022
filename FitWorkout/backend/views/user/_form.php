<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
    ); ?>

    <!-- Status -->
    <?= $form->field($model, 'status')->dropDownList(
        [
            10 => 'Ativo',
            0 => 'Suspenso',
        ],
        [
            'options' => ['status' => ['selected' => true]],
            'style' => 'width:200px;',
        ]
    ); ?>

    <!-- Roles -->
    <?= $form->field($model, 'authAssignment')->dropDownList(
        [
            'admin' => 'Admin',
            'client' => 'Cliente',
            // 'personalTrainer' => 'Personal Trainer',
        ],
        [
            'options' => [$model->authAssignment => ['selected' => true]],
            'style' => 'width:200px;',
        ]
    ); ?>

    <!-- Submeter -->
    <div class="form-group">
        <?= Html::submitButton(
            '<i class="fas fa-save"></i> Salvar',
            [
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