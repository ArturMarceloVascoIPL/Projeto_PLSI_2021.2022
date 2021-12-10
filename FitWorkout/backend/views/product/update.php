<?php

use yii\helpers\Html;
 
$this->title = 'Atualizar Produto: ' . $model->name;
?>
<div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
