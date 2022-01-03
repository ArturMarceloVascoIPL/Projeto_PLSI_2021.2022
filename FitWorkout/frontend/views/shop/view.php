<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-6">
            <?= Html::img('@web/' . $model->image . '', ['alt' => 'some', 'style' => 'width: 50%', 'class' => 'img-thumbnail m-5 d-block float-left']); ?>
        </div>

        <div class="col-6">
            <h3 class=""><?= $model->description?></h3>
            <br><br>

            <?= Html::a('Comprar por '. $model->price . '€', ['/controller/action'], ['class'=>'btn btn-primary']) ?>
        </div>
    </div>

</div>
