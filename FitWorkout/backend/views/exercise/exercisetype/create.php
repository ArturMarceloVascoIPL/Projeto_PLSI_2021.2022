<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisetype */

$this->title = 'Criar Tipo de Exercicio';
$this->params['breadcrumbs'][] = ['label' => 'Exercisetypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercisetype-create">

    <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-info']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>