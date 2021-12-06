<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisecategory */

$this->title = 'Criar Categoria de Exercicio';
?>
<div class="exercisecategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
