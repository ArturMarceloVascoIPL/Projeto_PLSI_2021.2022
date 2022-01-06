<?php

use yii\helpers\Html;
?>

<h4 class="d-flex align-items-center justify-content-center" style=" background: -webkit-linear-gradient(#00b0fa, blue); -webkit-background-clip: text;-webkit-text-fill-color: transparent;">
    <p class="login-box-msg">Backend | Login Page (Admin - Personal Trainer)</p>
</h4>

<div class="d-flex align-items-center justify-content-center">

    <div class="card">
        <div class="card-body login-card-body">
            <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

            <?= $form->field($model, 'username', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{error}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
        </div>
        <br>
        <?php \yii\bootstrap4\ActiveForm::end(); ?>
    </div>
</div>

<div class="d-flex align-items-center justify-content-center " style="margin-top: 20px;">
    <?= Html::img('@web/img/logo.png', ['alt' => 'FitWorkout', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8']) ?>
    <span class="brand-text font-weight-light">Fit Workout</span>
</div>