<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WorkoutExercise */

$this->title = 'Create Workout Exercise';
$this->params['breadcrumbs'][] = ['label' => 'Workout Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-exercise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
