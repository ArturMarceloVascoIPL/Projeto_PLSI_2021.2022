<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workoutplan".
 *
 * @property int $workoutId
 * @property int $planId
 *
 * @property Plan $plan
 * @property Workout $workout
 */
class Workoutplan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workoutplan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workoutId', 'planId'], 'required'],
            [['workoutId', 'planId'], 'integer'],
            [['workoutId', 'planId'], 'unique', 'targetAttribute' => ['workoutId', 'planId']],
            [['planId'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['planId' => 'id']],
            [['workoutId'], 'exist', 'skipOnError' => true, 'targetClass' => Workout::className(), 'targetAttribute' => ['workoutId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'workoutId' => 'Workout ID',
            'planId' => 'Plan ID',
        ];
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'planId']);
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
