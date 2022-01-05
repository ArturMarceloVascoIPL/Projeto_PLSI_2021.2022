<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Workout */

$this->title = 'Criar Treino';
?>
<div class="workout-create">
 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
