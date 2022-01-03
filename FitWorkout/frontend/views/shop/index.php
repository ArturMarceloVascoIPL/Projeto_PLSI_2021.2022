<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;

$this->title = 'Loja';

?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="site-about">
        <h1><?= Html::encode($this->title) ?></h1>

        <body style="z-index: -5;">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-8 order-md-2 col-lg">
                        <div class="container-fluid">
                            <div class="row   mb-5">
                                <div class="col-12">
                                    <div class="dropdown text-md-left text-center float-md-left mb-3 mt-3 mt-md-0 mb-md-0">
                                        <label class="mr-2">Sort by:</label>
                                        <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relevance <span class="caret"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(71px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Relevance</a>
                                            <a class="dropdown-item" href="#">Price Descending</a>
                                            <a class="dropdown-item" href="#">Price Ascending</a>
                                            <a class="dropdown-item" href="#">Best Selling</a>
                                        </div>
                                    </div>
                                    <div class="btn-group float-md-right ml-3">
                                        <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                                        <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                                    </div>
                                    <div class="dropdown float-right">
                                        <label class="mr-2">View:</label>
                                        <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">9 <span class="caret"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                                            <a class="dropdown-item" href="#">12</a>
                                            <a class="dropdown-item" href="#">24</a>
                                            <a class="dropdown-item" href="#">48</a>
                                            <a class="dropdown-item" href="#">96</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <?php foreach ($dataProvider->getModels() as $data) { ?>
                                    <div class="col-6 col-md-6 col-lg-4 mb-3">
                                        <div class="card h-100 border-0">
                                            <div class="card-img-top">
                                                <?= Html::img('@common/' . $data->image . '', ['alt' => 'some', 'style' => 'width: 50%', 'class' => 'img-fluid mx-auto d-block']); ?>
                                                //TODO: MOSTRAR IMAGENS
                                            </div>
                                            <div class="card-body text-center">
                                                <h4 class="card-title">
                                                <?= Html::a($data->name, ['view', 'id' => $data->id], ['class' => 'nav-link']) ?>
                                                </h4>
                                                <h5 class="card-price small text-warning">
                                                    <?= $data->price?> €
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>




                            </div>
                            <div class="row sorting mb-5 mt-5">
                                <div class="col-12">
                                    <a class="btn btn-light">
                                        <i class="fas fa-arrow-up mr-2"></i> Back to top</a>
                                    <div class="btn-group float-md-right ml-3">
                                        <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                                        <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                                    </div>
                                    <div class="dropdown float-md-right">
                                        <label class="mr-2">View:</label>
                                        <a class="btn btn-light btn-lg dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">12 <span class="caret"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">12</a>
                                            <a class="dropdown-item" href="#">24</a>
                                            <a class="dropdown-item" href="#">48</a>
                                            <a class="dropdown-item" href="#">96</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </body>
    </div>



</div>