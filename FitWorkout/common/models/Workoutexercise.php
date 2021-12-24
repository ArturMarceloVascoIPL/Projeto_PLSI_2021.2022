<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workoutexercise".
 *
 * @property int $exerciseId
 * @property int $workoutId
 * @property int $exerciseCalories
 * @property int|null $equipmentWeight
 * @property int $seriesSize
 * @property int $seriesNum
 * @property int|null $restTime
 *
 * @property Exercise $exercise
 * @property Exercisehistory[] $exercisehistories
 * @property Exercisehistory[] $exercisehistories0
 * @property Workout $workout
 */
class Workoutexercise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workoutexercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exerciseId', 'workoutId', 'exerciseCalories', 'seriesSize', 'seriesNum'], 'required'],
            [['exerciseId', 'workoutId', 'exerciseCalories', 'equipmentWeight', 'seriesSize', 'seriesNum', 'restTime'], 'integer'],
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
            'exerciseId' => 'ID do Exercício',
            'workoutId' => 'ID do Treino',
            'exerciseCalories' => 'Calorias do Exercício',
            'equipmentWeight' => 'Peso do Equipamento',
            'seriesSize' => 'Tamanho da Série',
            'seriesNum' => 'Número de Séries',
            'restTime' => 'Tempo de Descanso',
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
     * Gets query for [[Exercisehistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercisehistories()
    {
        return $this->hasMany(Exercisehistory::className(), ['workoutExercise_exerciseId' => 'exerciseId']);
    }

    /**
     * Gets query for [[Exercisehistories0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercisehistories0()
    {
        return $this->hasMany(Exercisehistory::className(), ['workoutExercise_workoutId' => 'workoutId']);
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
