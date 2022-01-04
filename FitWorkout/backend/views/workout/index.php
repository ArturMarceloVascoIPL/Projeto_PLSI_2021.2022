<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Workouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- Buttons Funcionalidades -->
    <div class="row mb-4">
        <div class="col">
            <?= Html::a('Create Workout', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col">
            <div class="float-right">
                <?= Html::a('Ver Workout Exercises', ['/workoutexercise'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'date',
            'ptId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>