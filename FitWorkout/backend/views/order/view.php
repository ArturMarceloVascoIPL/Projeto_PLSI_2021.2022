<?php

use yii\base\View;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Order ' . $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>

    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'priceTotal',
            'status',
            'userId',
        ],
    ]) ?>



    <div class="row justify-content-center">

        <div class="col-lg-4 col-md-12">
            <?= Html::a('<i class="fas fa-shopping-cart"></i> Em processamento', ['index'], ['class' => 'btn.block btn  bg-primary btn-block btn-lg']) ?>
        </div>

        <div class="col-lg-4 col-md-12">
            <?= Html::a('<i class="fas fa-truck-moving"></i> Em trânsito', ['index'], ['class' => 'btn.block btn bg-warning btn-block btn-lg']) ?>
        </div>

        <div class="col-lg-4 col-md-12">
            <?= Html::a('<i class="fas fa-home"></i> Entregue', ['index'], ['class' => 'btn.block btn bg-success btn-block btn-lg']) ?>
        </div>


    </div>

        <div class="row justify-content-center">

            <div class="col-12 ">
                <div class = "bg-primary w-100 mt-2 bg-danger text-center"> 
                    STATUS
                </div>
                
            </div>
    </div>

</div>