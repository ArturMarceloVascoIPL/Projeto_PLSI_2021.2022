<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Gestão de Categorias de Exercícios';

?>
<div class="exercisecategory-index">

    # TODO : Routing para pagina pai (exercises)
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

    <p>
        <?= Html::a('Adicionar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>