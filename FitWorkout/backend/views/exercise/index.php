<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExerciseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão de Exercicios';
?>
<div class="exercise-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'name',
            'description',
            'caloriesBurned',
            'typeId',
            'categoryId',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'contentOptions' => ['style' => 'width: 15%'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open">Ver</span>', $url, [
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
                ],
            ],
        ],
    ]); ?>

    <!-- Buttons Funcionalidades -->
    <div class="row">
        <div class="col">
            <?= Html::a('Adicionar Exercicio', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Ver Tipos', ['/exercisetype'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Ver Categorias', ['/exercisecategory'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>