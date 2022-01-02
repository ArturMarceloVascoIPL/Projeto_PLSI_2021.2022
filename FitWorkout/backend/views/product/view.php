<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>


    <div class="row mb-2">
        <div class="col">
            <?= DetailView::widget([

                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'description',
                    'stock',
                    'price',
                    'category.name',
                    'imageFileName'
                ],
            ]) ?>

        </div>
        <div class="col">
            <div class="float-right">
                <?php
                // var_dump('@common/uploads/products/' . $model->imageFileName . '');
                // die();
                ?>
                <?= Html::img(
                    Yii::getAlias('@common') . '/uploads/products/' . $model->imageFileName,
                    ['alt' => 'some', 'style' => 'width: 50%']
                ); ?>
            </div>
        </div>
    </div>
</div>