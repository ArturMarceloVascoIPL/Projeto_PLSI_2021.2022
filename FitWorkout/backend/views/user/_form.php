<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$auth = Yii::$app->authManager;
$userRole = array_keys($auth->getRolesByUser($model->id))[0];
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
    <?= $form->field($model, 'role')->dropDownList(
        [
            'admin' => 'Admin',
            'client' => 'Cliente',
            // 'personalTrainer' => 'Personal Trainer',
        ],
        [
            'options' => [$userRole => ['selected' => true]],
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