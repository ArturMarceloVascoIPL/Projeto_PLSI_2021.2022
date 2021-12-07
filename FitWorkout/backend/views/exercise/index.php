<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExerciseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão de Exercicios';
?>
<div class="exercise-index">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('Adicionar Exercicio', ['create'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Ver Tipos', ['/exercisetype'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Ver Categorias', ['/exercisecategory'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'name',
            'description',
            [
                'attribute' => 'caloriesBurned',
                'label' => 'Calorias',
                'options' => ['style' => 'width: 10%'],
            ],
            [
                'label' => 'Tipo',
                'attribute' => 'type',
                'value' => 'type.name',
            ],
            // # TODO : Filtro dos tipos e dos exercicios, a fazer no ExerciceSearch
            [
                'label' => 'Categoria',
                'attribute' => 'category',
                'value' => 'category.name',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'contentOptions' => ['style' => 'width: 20%'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<span>Ver</span>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class' => 'btn bg-gradient-success',
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a('<span>Editar</span>', $url, [
                            'title' => Yii::t('app', 'Update'),
                            'class' => 'btn btn-info',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('<span>Apagar</span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Tem a certeza que pretende apagar este item?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>