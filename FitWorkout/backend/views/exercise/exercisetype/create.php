<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisetype */

$this->title = 'Criar Tipo de Exercicio';
?>
<div class="exercisetype-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>