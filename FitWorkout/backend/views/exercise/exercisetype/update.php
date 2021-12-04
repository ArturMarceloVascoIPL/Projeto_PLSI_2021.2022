<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisetype */

$this->title = 'Atualizar Tipo de Exercicio: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Exercisetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exercisetype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>