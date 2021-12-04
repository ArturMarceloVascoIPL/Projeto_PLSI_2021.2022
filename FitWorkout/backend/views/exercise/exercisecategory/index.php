<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Gestão de Categorias de Exercícios';

?>
<div class="exercisecategory-index">

    <?= Html::a('Voltar', Yii::$app->request->referrer) ?>

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
        <?= Html::a('Adicionar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>