<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workout".
 *
 * @property int $id
 * @property string $name
 * @property string|null $date
 * @property int $ptId
 *
 * @property Exercise[] $exercises
 * @property Plan[] $plans
 * @property Planworkout[] $planworkouts
 * @property Userprofile $pt
 * @property Workoutexercise[] $workoutexercises
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
            [['name', 'ptId'], 'required'],
            [['date'], 'safe'],
            [['ptId'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['ptId'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['ptId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'date' => 'Data',
            'ptId' => 'ID do Personal Trainer',
            'user.username' => 'Nome do Personal Trainer',
        ];
    }

    /**
     * Gets query for [[Exercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercises()
    {
        return $this->hasMany(Exercise::className(), ['id' => 'exerciseId'])->viaTable('workoutexercise', ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Plans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['id' => 'planId'])->viaTable('planworkout', ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Planworkouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanworkouts()
    {
        return $this->hasMany(Planworkout::className(), ['workoutId' => 'id']);
    }

    /**
     * Gets query for [[Pt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPt()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'ptId']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'ptId']);
    }

    /**
     * Gets query for [[Workoutexercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutexercises()
    {
        return $this->hasMany(Workoutexercise::className(), ['workoutId' => 'id']);
    }
}
