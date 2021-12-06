<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Exercise */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="exercise-view">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Tem certeza de que deseja excluir este item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Nome',
                'value' =>  'name',
            ],
            [
                'label' => 'Descrição',
                'value' =>  'description',
            ],
            [
                'label' => 'Calorias (Kcal)',
                'value' => 'caloriesBurned',
            ],
            [
                'label' => 'Tipo',
                'attribute' => 'type.name',
            ],
            [
                'label' => 'Categoria',
                'attribute' => 'category.name',
            ],
        ],
    ]) ?>

</div>