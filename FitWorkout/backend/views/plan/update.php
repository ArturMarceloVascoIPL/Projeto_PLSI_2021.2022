<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

$this->title = 'Editar Plano de Treino: ' . $model->id;
?>
<div class="plan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
