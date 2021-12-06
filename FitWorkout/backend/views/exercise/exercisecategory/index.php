<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Gestão de Categorias de Exercícios';

?>
<div class="exercisecategory-index">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['mainindex'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Adicionar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'ID',
                'attribute' => 'id',
                'options' => ['width' => '5%'],
            ],
            [
                'label' => 'Nome',
                'attribute' => 'name',
                'options' => ['width' => '15%'],
            ],
            [
                'label' => 'Descrição',
                'attribute' => 'description',
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