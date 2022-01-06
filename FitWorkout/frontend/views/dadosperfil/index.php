<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Editar Dados de Perfil';

?>

<div class="site-login container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Editar Outros Dados', ['create'], ['class' => 'btn btn-info']) ?>

    <?= $this->render('_form', [
        'modelUser' => $modelUser,
        'modelProfile' => $modelProfile,
        'modelData' => $modelData
    ]) ?>

</div>