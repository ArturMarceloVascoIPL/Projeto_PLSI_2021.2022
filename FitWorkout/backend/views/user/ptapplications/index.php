<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\grid\ActionColumn;

$this->title = 'Aplicações para Personal Trainer';
?>
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
        'id',
        'username.username',
        'cvFilename',
        'qualificationFilename',
        'jobTime',
        'comment',
        [
            'attribute' => 'approved',
            'value' => function ($model) {
                return $model->approved ? 'Aprovado' : 'Não Aprovado';
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'contentOptions' => ['style' => 'width: 20%'],
            'template' => '{view} ', //{update}
            'buttons' => [
                'view' => function ($url) {
                    return Html::a('<span>Ver</span>', $url, [
                        'title' => Yii::t('app', 'View'),
                        'class' => 'btn bg-gradient-success',
                    ]);
                },
                // 'update' => function ($url) {
                //     return Html::a('<span>Editar</span>', $url, [
                //         'title' => Yii::t('app', 'Update'),
                //         'class' => 'btn btn-info',
                //     ]);
                // },
            ],
        ],
    ],
]); ?>