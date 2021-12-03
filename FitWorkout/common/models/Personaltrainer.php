<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "personaltrainer".
 *
 * @property int $userId
 * @property string $qualificationProof
 *
 * @property Chat[] $chats
 * @property Exercisesuggestions[] $exercisesuggestions
 * @property Plan[] $plans
 * @property User $user
 * @property Workout[] $workouts
 */
class Personaltrainer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personaltrainer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qualificationProof'], 'required'],
            [['qualificationProof'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'User ID',
            'qualificationProof' => 'Qualification Proof',
        ];
    }

    /**
     * Gets query for [[Chats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['ptId' => 'userId']);
    }

    /**
     * Gets query for [[Exercisesuggestions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercisesuggestions()
    {
        return $this->hasMany(Exercisesuggestions::className(), ['personalTrainerId' => 'userId']);
    }

    /**
     * Gets query for [[Plans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['ptId' => 'userId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * Gets query for [[Workouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkouts()
    {
        return $this->hasMany(Workout::className(), ['ptId' => 'userId']);
    }
}
