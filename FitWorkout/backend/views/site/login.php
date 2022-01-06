<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<div class="card m-b-4">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Backend | Login Page (Admin - Personal Trainer)</p>

        <div class="col-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

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

            <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
    <!-- /.login-card-body -->
</div>