<?php

use yii\helpers\Html;

$this->title = 'Criar Categoria'; 
?>
<div class="productcategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
