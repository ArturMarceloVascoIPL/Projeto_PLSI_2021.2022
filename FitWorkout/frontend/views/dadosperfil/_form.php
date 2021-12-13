<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form ActiveForm */
?>
<div class="dadosperfil-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'weight') ?>
        <?= $form->field($model, 'height') ?>
        //TODO: resolver erro
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- dadosperfil-index -->