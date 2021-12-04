<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisecategory */

$this->title = 'Atualizar Categoria: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Exercisecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

echo \yii\helpers\Html::a('Voltar', ['index'], ['class' => 'btn btn-info']);
?>
<div class="exercisecategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>