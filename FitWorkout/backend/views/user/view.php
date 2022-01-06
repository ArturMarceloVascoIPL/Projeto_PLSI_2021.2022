<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$auth = \Yii::$app->authManager;
$userRole = array_keys($auth->getRolesByUser($model->id))[0];
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Ver Utilizador: ' . $model->username;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div><?php
                    #todo Implementar func update disabled account 
                    //(ter q mandar func diretamente para o controller)
                    //  Html::a('Disable', ['update', 'id' => $model->id], [
                    //     'class' => 'btn btn-danger',
                    //     'data' => [
                    //         'confirm' => 'Are you sure you want to delete this item?',
                    //         'method' => 'post',
                    //     ],
                    // ]) 
                    ?>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 10 ? 'Ativo' : 'Suspenso';
                },
                'filter' => [10 => 'Ativo', 0 => 'Suspenso'],
                // 'contentOptions' => ['style' => 'color: green; font-weight: bold;'],
                // 'contentOptions' => function ($model) {
                //     $status  = $model->status;
                //     if ($status == 10) {
                //         return ['style' => 'color: green; font-weight: bold;'];
                //     } else {
                //         return ['style' => 'color: red; font-weight: bold;'];
                //     }
                // },
            ],
            [
                'label' => 'Role',
                'attribute' => 'role',
                'value' => $userRole,
                'filter' => [
                    'admin' => 'Admin',
                    'client' => 'Client',
                    'personalTrainer' => 'Personal Trainer',
                ],
            ],
        ],
    ]) ?>

</div>