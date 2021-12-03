<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workout".
 *
 * @property int $id
 * @property string $name
 * @property string|null $date
 * @property int $totalCaloriesBurned
 * @property int $ptId
 *
 * @property Exercise[] $exercises
 * @property Exerciseworkout[] $exerciseworkouts
 * @property Plan[] $plans
 * @property Personaltrainer $pt
 * @property Workouthistory[] $workouthistories
 * @property Workoutplan[] $workoutplans
 */
class Workout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'totalCaloriesBurned', 'ptId'], 'required'],
            [['date'], 'safe'],
            [['totalCaloriesBurned', 'ptId'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['ptId'], 'exist', 'skipOnError' => true, 'targetClass' => Personaltrainer::className(), 'targetAttribute' => ['ptId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'totalCaloriesBurned' => 'Total Calories Burned',
            'ptId' => 'Pt ID',
        ];
    }

    /**
     * Gets query for [[Exercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercises()
    {
        return $this->hasMany(Exercise::className(), ['id' => 'exerciseId'])->viaTable('exerciseworkout', ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Exerciseworkouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExerciseworkouts()
    {
        return $this->hasMany(Exerciseworkout::className(), ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Plans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['id' => 'planId'])->viaTable('workoutplan', ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Pt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPt()
    {
        return $this->hasOne(Personaltrainer::className(), ['userId' => 'ptId']);
    }

    /**
     * Gets query for [[Workouthistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkouthistories()
    {
        return $this->hasMany(Workouthistory::className(), ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Workoutplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutplans()
    {
        return $this->hasMany(Workoutplan::className(), ['workoutId' => 'id']);
    }
}
