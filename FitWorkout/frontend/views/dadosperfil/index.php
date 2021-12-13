<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Dados de Perfil';

?>

<div class="site-login container-fluid">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?> 
    
    <div class="row">
        <div class="col">
            <h1><?= Html::encode($this->title) ?></h1>
            <br>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputUsername4">Username</label>
                        <input type="text" class="form-control" id="inputUsername4" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="inputApelido">Apelido</label>
                    <input type="text" class="form-control" id="inputApelido" placeholder="Apelido">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAltura">Altura</label>
                        <input type="number" class="form-control" id="inputAltura" placeholder="Altura">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPeso">Peso</label>
                        <input type="number" class="form-control" id="inputPeso" placeholder="Peso">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submeter</button>
            </form>
            

        </div>
    </div>

</div>