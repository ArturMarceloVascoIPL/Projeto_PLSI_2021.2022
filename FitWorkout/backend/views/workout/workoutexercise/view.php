<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WorkoutExercise */

$this->title = $model->exerciseId;
$this->params['breadcrumbs'][] = ['label' => 'Workout Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workout-exercise-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'exerciseId' => $model->exerciseId, 'workoutId' => $model->workoutId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'exerciseId' => $model->exerciseId, 'workoutId' => $model->workoutId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'exerciseId',
            'workoutId',
            'exerciseCalories',
            'equipmentWeight',
            'seriesSize',
            'seriesNum',
            'restTime:datetime',
        ],
    ]) ?>

</div>
