<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Gestão de Produtos';
?>
<div class="product-index">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('Adicionar Produto', ['create'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Ver Categorias', ['/productcategory'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]);     
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'ID',
                'attribute' => 'id',
                'options' => ['style' => 'width: 50px;'],
            ],
            [
                'label' => 'Nome',
                'attribute' => 'name',
            ],
            [
                'label' => 'Descrição',
                'attribute' => 'description',
            ],
            [
                'label' => 'Stock (Nº unidades)',
                'attribute' => 'stock',
            ],
            [
                'label' => 'Preço (€)',
                'attribute' => 'price',
            ],
            [
                'label' => 'Categoria',
                'attribute' => 'category.name',
                'value' => 'category.name',
            ],
            // 'image',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'contentOptions' => ['style' => 'width: 15%'],
                'template' => '{view} {update}',
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