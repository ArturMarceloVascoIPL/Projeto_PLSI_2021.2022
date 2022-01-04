<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= $this->title = "Loja" ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'stock',
            'price',
            'image',
            'categoryId',
        ],
    ]) ?>

</div>