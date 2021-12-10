<?php

use yii\helpers\Html; 

$this->title = 'Atualizar Categoria de Produto: ' . $model->name; 
?>

<div class="productcategory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
