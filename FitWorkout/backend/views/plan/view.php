<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */
use yii\web\User;
use common\models\Userprofile;

$this->title = "Plano Treino: " . $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="plan-view">

    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['index'], ['class' => 'btn.block btn btn-info']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Adicionar Treinos', ['addtreinos', 'id' => $model->id], ['class' => 'btn bg-gradient-success']) ?>
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'dateStart',
            'dateEnd',
            'description',
            'pt.username',
            'client.username'
        ],
    ]) ?>

    <h3>Lista de Treinos: </h3>
    <?php foreach ($workoutModel as $key => $workout) {
        echo "<hr>";
        echo Html::a('Ver Treino: ' . $workout->name, ['/workout/view', 'id' => $workout->id]);
    }  ?>
    <hr>
</div>