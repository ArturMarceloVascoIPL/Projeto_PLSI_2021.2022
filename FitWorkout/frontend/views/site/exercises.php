<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Exercicios';
$this->params['breadcrumbs'][] = $this->title;
?>
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <a href="product.html" class=" font-weight-bold text-dark text-uppercase small"> Exercicio</a>
                                        </h4>
                                        <h5 class="card-price small text-warning">
                                            Descriçao
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <a href="product.html" class=" font-weight-bold text-dark text-uppercase small"> Exercicio</a>
                                        </h4>
                                        <h5 class="card-price small text-warning">
                                            Descriçao
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <a href="product.html" class=" font-weight-bold text-dark text-uppercase small"> Exercicio</a>
                                        </h4>
                                        <h5 class="card-price small text-warning">
                                            Descriçao
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Card image cap">
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <a href="product.html" class=" font-weight-bold text-dark text-uppercase small"> Exercicio</a>
                                        </h4>
                                        <h5 class="card-price small text-warning">
                                            Descriçao
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>