<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercise */

$this->title = 'Criar Exercicio';
?>
<div class="exercise-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
