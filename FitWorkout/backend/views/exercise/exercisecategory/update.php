<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisecategory */

$this->title = 'Atualizar Categoria: ' . $model->name;
?>
<div class="exercisecategory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>