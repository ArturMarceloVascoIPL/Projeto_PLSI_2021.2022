<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

$this->title = 'Adicionar Plano de Treino';
?>
<div class="plan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
