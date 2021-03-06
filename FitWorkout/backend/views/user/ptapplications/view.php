<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\assets\CommonAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Ptapplication */

$this->title = $model->id;
\yii\web\YiiAsset::register($this);
CommonAsset::register($this);
?>
<div class="ptapplication-view">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Aprovar', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'cvFilename',
                    'qualificationFilename',
                    'jobTime:datetime',
                    'comment',
                    [
                        'attribute' => 'approved',
                        'value' => function ($model) {
                            return $model->approved ? 'Aprovado' : 'Não Aprovado';
                        },
                    ],
                    'userId',
                    'username.username',
                ],
            ]) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <div class="row">
                    CV Ficheiro:
                    <?= Html::img('@common/' . $model->cvFilename, ['alt' => 'some', 'style' => 'width: 50%']); ?>
                </div>

                <div class="row">
                    Qualificacoes Ficheiro:
                    <?= Html::img('@common/' . $model->qualificationFilename, ['alt' => 'some', 'style' => 'width: 50%']); ?>
                </div>

            </div>
        </div>
    </div>
</div>