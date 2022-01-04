<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WorkoutExercise */

$this->title = 'Update Workout Exercise: ' . $model->exerciseId;
$this->params['breadcrumbs'][] = ['label' => 'Workout Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exerciseId, 'url' => ['view', 'exerciseId' => $model->exerciseId, 'workoutId' => $model->workoutId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workout-exercise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
