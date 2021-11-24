<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Personal Trainer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <br><br>


    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:30%">Nome</th>
                <th style="width:60%">Preço</th>
                <th style="width:10%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Marcelo</th>
                <td>5€</td>
                <td><button type="button" class="btn btn-primary btn-sm m-0 p-2" style="background-color: #5672F9;">Contratar</button></td>
            </tr>

            <tr>
                <th scope="row">Marcelo</th>
                <td>5€</td>
                <td><button type="button" class="btn btn-primary btn-sm m-0 p-2" style="background-color: #5672F9;">Contratar</button></td>
            </tr>

            <tr>
                <th scope="row">Marcelo</th>
                <td>5€</td>
                <td><button type="button" class="btn btn-primary btn-sm m-0 p-2" style="background-color: #5672F9;">Contratar</button></td>
            </tr>

            <tr>
                <th scope="row">Marcelo</th>
                <td>5€</td>
                <td><button type="button" class="btn btn-primary btn-sm m-0 p-2" style="background-color: #5672F9;">Contratar</button></td>
            </tr>

            <tr>
                <th scope="row">Marcelo</th>
                <td>5€</td>
                <td><button type="button" class="btn btn-primary btn-sm m-0 p-2" style="background-color: #5672F9;">Contratar</button></td>
            </tr>
        </tbody>
    </table>
</div>