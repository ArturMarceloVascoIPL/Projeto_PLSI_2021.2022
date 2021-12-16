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

        <?= $form->field($modelclient, 'weight') ?>
        <?= $form->field($modelclient, 'height') ?>

        <?= $form->field($modeluser, 'email') ?>


        <!-- //TODO: Acrescentar nome e apelido à base de dados -->
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- dadosperfil-index -->