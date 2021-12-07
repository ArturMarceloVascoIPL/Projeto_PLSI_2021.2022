<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Button;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="user-index">

    <div class="row">
        <div class="col">
            <div class="float-right">
                <?php $this->title = 'Gestão de Utilizadores' ?>
                <!-- <a href="<?php echo Url::toRoute('ptapplications') ?>" class="float-right btn btn-primary btn-lg">Ver Pedidos PT</a> -->
            </div>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'label' => 'ID',
                'contentOptions' => ['style' => 'width: 10%;'],
            ],
            'username',
            'email',
            [
                'label' => 'Role',
                'attribute' => 'role',
                'contentOptions' => ['style' => 'width: 10%;'],
                'value' => 'role.item_name',
                'filter' => [
                    'admin' => 'Admin',
                    'personalTrainer' => 'Personal Trainer',
                    'client' => 'Client',
                ],
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 10 ? 'Ativo' : 'Suspenso';
                },
                'contentOptions' => function ($model) {
                    return $model->status == 10 ? ['style' => 'color: green;'] : ['style' => 'color: red;'];
                },
                'filter' => [10 => 'Ativo', 0 => 'Suspenso'],
            ],
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
                ],
            ],
        ],
    ]);
    ?>


</div>