<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercisecategory */

$this->title = 'Criar Categoria de Exercicio';
$this->params['breadcrumbs'][] = ['label' => 'Exercisecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercisecategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
