<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisetype */

$this->title = 'Atualizar Tipo de Exercicio: ' . $model->name;

?>
<div class="exercisetype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>