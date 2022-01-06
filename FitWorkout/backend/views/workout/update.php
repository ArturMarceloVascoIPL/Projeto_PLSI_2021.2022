<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Workout */

$this->title = 'Editar: ' . $model->name;
?>
<div class="workout-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
