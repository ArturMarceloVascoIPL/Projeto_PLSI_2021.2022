<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Aplicar para ser Personal Trainer';

?>

<div class="site-login container-fluid">
    
    <div class="row">
        <div class="col">
            <h1><?= Html::encode($this->title) ?></h1>
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