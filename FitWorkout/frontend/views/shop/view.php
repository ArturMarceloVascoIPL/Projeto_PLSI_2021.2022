<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;


\yii\web\YiiAsset::register($this);
?>
<div class="product-view">
    <div class="mt-5">
        <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-6">
            

        <div class="col-6">
            <h3 class=""><?= $model->description?></h3>
            <br><br>

            <?=Html::a('Comprar por '. $model->price . '€', ['searchorder','productId' => $model->id], ['class'=>'btn btn-primary']) ?>
        </div>
    </div>
    </div>
    
    

</div>