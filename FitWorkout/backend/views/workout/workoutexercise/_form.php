<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WorkoutExercise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workout-exercise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exerciseId')->textInput() ?>

    <?= $form->field($model, 'workoutId')->textInput() ?>

    <?= $form->field($model, 'exerciseCalories')->textInput() ?>

    <?= $form->field($model, 'equipmentWeight')->textInput() ?>

    <?= $form->field($model, 'seriesSize')->textInput() ?>

    <?= $form->field($model, 'seriesNum')->textInput() ?>

    <?= $form->field($model, 'restTime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
