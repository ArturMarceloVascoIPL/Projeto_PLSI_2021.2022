<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exerciseworkout".
 *
 * @property int $exerciseId
 * @property int $workoutId
 * @property int $exerciseNumber
 * @property int $exerciseCalories
 * @property int $totalCaloriesBurned
 *
 * @property Exercise $exercise
 * @property Workout $workout
 */
class Exerciseworkout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exerciseworkout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exerciseId', 'workoutId', 'exerciseNumber', 'exerciseCalories', 'totalCaloriesBurned'], 'required'],
            [['exerciseId', 'workoutId', 'exerciseNumber', 'exerciseCalories', 'totalCaloriesBurned'], 'integer'],
            [['exerciseId', 'workoutId'], 'unique', 'targetAttribute' => ['exerciseId', 'workoutId']],
            [['exerciseId'], 'exist', 'skipOnError' => true, 'targetClass' => Exercise::className(), 'targetAttribute' => ['exerciseId' => 'id']],
            [['workoutId'], 'exist', 'skipOnError' => true, 'targetClass' => Workout::className(), 'targetAttribute' => ['workoutId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exerciseId' => 'Exercise ID',
            'workoutId' => 'Workout ID',
            'exerciseNumber' => 'Exercise Number',
            'exerciseCalories' => 'Exercise Calories',
            'totalCaloriesBurned' => 'Total Calories Burned',
        ];
    }

    /**
     * Gets query for [[Exercise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercise()
    {
        return $this->hasOne(Exercise::className(), ['id' => 'exerciseId']);
    }

    /**
     * Gets query for [[Workout]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkout()
    {
        return $this->hasOne(Workout::className(), ['id' => 'workoutId']);
    }
}
