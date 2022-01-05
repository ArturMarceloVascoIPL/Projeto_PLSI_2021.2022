<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Workout */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="workout-view">


    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Adicionar Exercicios', ['exercisesadd', 'id' => $model->id], ['class' => 'btn bg-gradient-success']) ?>
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date',
            'ptId',
        ],
    ]) ?>

    <?php foreach ($exerciseModel as $key => $exercise) {
        echo "<br>".$exercise->name;
    }  ?>

</div>