<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercisehistory".
 *
 * @property int $id
 * @property string $timeStamp
 * @property int $duration
 * @property int|null $equipmentWeight
 * @property int $seriesSize
 * @property int $seriesNum
 * @property int $userId
 * @property int $workoutExercise_exerciseId
 * @property int $workoutExercise_workoutId
 *
 * @property Userprofile $user
 * @property Workoutexercise $workoutExerciseExercise
 * @property Workoutexercise $workoutExerciseWorkout
 */
class Exercisehistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercisehistory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timeStamp', 'duration', 'seriesSize', 'seriesNum', 'userId', 'workoutExercise_exerciseId', 'workoutExercise_workoutId'], 'required'],
            [['timeStamp'], 'safe'],
            [['duration', 'equipmentWeight', 'seriesSize', 'seriesNum', 'userId', 'workoutExercise_exerciseId', 'workoutExercise_workoutId'], 'integer'],
            [['workoutExercise_exerciseId'], 'exist', 'skipOnError' => true, 'targetClass' => Workoutexercise::className(), 'targetAttribute' => ['workoutExercise_exerciseId' => 'exerciseId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['userId' => 'userId']],
            [['workoutExercise_workoutId'], 'exist', 'skipOnError' => true, 'targetClass' => Workoutexercise::className(), 'targetAttribute' => ['workoutExercise_workoutId' => 'workoutId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timeStamp' => 'Time Stamp',
            'duration' => 'Duração',
            'equipmentWeight' => 'Peso do Equipamento',
            'seriesSize' => 'Tamanho da Série',
            'seriesNum' => 'Número de Séries',
            'userId' => 'ID do Utilizador',
            'workoutExercise_exerciseId' => 'Workout Exercise Exercise ID',
            'workoutExercise_workoutId' => 'Workout Exercise Workout ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'userId']);
    }

    /**
     * Gets query for [[WorkoutExerciseExercise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutExerciseExercise()
    {
        return $this->hasOne(Workoutexercise::className(), ['exerciseId' => 'workoutExercise_exerciseId']);
    }

    /**
     * Gets query for [[WorkoutExerciseWorkout]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutExerciseWorkout()
    {
        return $this->hasOne(Workoutexercise::className(), ['workoutId' => 'workoutExercise_workoutId']);
    }
}
