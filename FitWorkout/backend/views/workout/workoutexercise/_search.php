<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WorkoutExerciseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workout-exercise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'exerciseId') ?>

    <?= $form->field($model, 'workoutId') ?>

    <?= $form->field($model, 'exerciseCalories') ?>

    <?= $form->field($model, 'equipmentWeight') ?>

    <?= $form->field($model, 'seriesSize') ?>

    <?php // echo $form->field($model, 'seriesNum') ?>

    <?php // echo $form->field($model, 'restTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
