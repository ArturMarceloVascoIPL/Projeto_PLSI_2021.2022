<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workouthistory".
 *
 * @property int $id
 * @property int $duration
 * @property int $totalCaloriesBurned
 * @property int $clientId
 * @property int $workoutId
 *
 * @property Client $client
 * @property Workout $workout
 */
class Workouthistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workouthistory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['duration', 'totalCaloriesBurned', 'clientId', 'workoutId'], 'required'],
            [['duration', 'totalCaloriesBurned', 'clientId', 'workoutId'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['clientId' => 'userId']],
            [['workoutId'], 'exist', 'skipOnError' => true, 'targetClass' => Workout::className(), 'targetAttribute' => ['workoutId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'duration' => 'Duration',
            'totalCaloriesBurned' => 'Total Calories Burned',
            'clientId' => 'Client ID',
            'workoutId' => 'Workout ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['userId' => 'clientId']);
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
