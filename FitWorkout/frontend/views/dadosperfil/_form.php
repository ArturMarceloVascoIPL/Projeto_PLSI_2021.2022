<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form ActiveForm */


?>
<div class="dadosperfil-index">
    <?php ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelProfile, 'address') ?>

    <?= $form->field($modelProfile, 'nif') ?>

    <?= $form->field($modelProfile, 'postalCode') ?>

    <?= $form->field($modelProfile, 'city') ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-app bg-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div><!-- dadosperfil-index -->