<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Dados de Perfil';

?>

<div class="site-login container-fluid">


    <div class="row">
        <div class="col-6">
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

        <div class="col-6">
            <h1>Aplicar para ser PT</h1>
            <br>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comentários</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="validatedCustomFile">Ficheiro</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submeter</button>
            </form>
        </div>
    </div>

</div>