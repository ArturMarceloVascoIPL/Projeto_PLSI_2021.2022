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

    <!-- <div class="row">
        <div class="col">
            <div class="float-right">
                <?php $this->title = 'Users' ?>
                <a href="<?php echo Url::toRoute('ptapplications') ?>" class="float-right btn btn-primary btn-lg">Ver Pedidos PT</a>
            </div>
        </div>
    </div> -->


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
                // 'attribute' => 'roleAsText',
                'attribute' => 'authAssignment',
                'contentOptions' => ['style' => 'width: 10%;'],
                'value' => 'authAssignment.item_name',
                // 'value' => function ($model) {
                //     // var_dump($model->authAssignment->item_name);
                //     // die();
                //     $xpo = $model->authAssignment;
                //     // var_dump($xpo->item_name);
                //     // die();
                //     if (strval($xpo->item_name) == 'admin') {
                //         return 'Administrador';
                //     }
                //     return 'ABC';
                // },
                // 'value' => function ($model) {
                //     return $model->authAssignment->item_name == 'Admin' ? 'Admin' : 'ABC';
                // },
             
                'filter' => [
                    'admin' => 'Admin',
                    'personalTrainer' => 'Personal Trainer',
                    'client' => 'Client',
                ],
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 10 ? 'Ativo' : 'Inativo';
                },
                'filter' => [10 => 'Ativo', 0 => 'Inativo'],
            ],
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
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',

            // 'created_at',
            // 'updated_at',
            // 'verification_token',
        ],
    ]);
    ?>


</div>