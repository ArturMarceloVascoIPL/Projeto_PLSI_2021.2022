<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Gestão de Tipos de Exercícios';
?>

<div class="exercisetype-index">

    <?= Html::a('Voltar', ['mainindex'], ['class' => 'btn btn-info']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',

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

    <p>
        <?= Html::a('Adicionar Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>