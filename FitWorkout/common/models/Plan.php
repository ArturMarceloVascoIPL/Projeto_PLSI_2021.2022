<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property string $dateStart
 * @property string $dateEnd
 * @property int $ptId
 * @property int $clientId
 *
 * @property Client $client
 * @property Personaltrainer $pt
 * @property Workoutplan[] $workoutplans
 * @property Workout[] $workouts
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateStart', 'dateEnd', 'ptId', 'clientId'], 'required'],
            [['dateStart', 'dateEnd'], 'safe'],
            [['ptId', 'clientId'], 'integer'],
            [['clientId'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['clientId' => 'userId']],
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
            'dateStart' => 'Date Start',
            'dateEnd' => 'Date End',
            'ptId' => 'Pt ID',
            'clientId' => 'Client ID',
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
     * Gets query for [[Pt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPt()
    {
        return $this->hasOne(Personaltrainer::className(), ['userId' => 'ptId']);
    }

    /**
     * Gets query for [[Workoutplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutplans()
    {
        return $this->hasMany(Workoutplan::className(), ['planId' => 'id']);
    }

    /**
     * Gets query for [[Workouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkouts()
    {
        return $this->hasMany(Workout::className(), ['id' => 'workoutId'])->viaTable('workoutplan', ['planId' => 'id']);
    }
}
