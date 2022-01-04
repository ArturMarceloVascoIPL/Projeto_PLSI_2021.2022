<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WorkoutExerciseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Workout Exercises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-exercise-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Workout Exercise', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'exerciseId',
            'workoutId',
            'exerciseCalories',
            'equipmentWeight',
            'seriesSize',
            //'seriesNum',
            //'restTime:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
