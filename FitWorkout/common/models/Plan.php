<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property string $dateStart
 * @property string $dateEnd
 * @property string $description
 * @property int $ptPlan
 * @property int $userId
 *
 * @property Planworkout[] $planworkouts
 * @property Userprofile $ptPlan0
 * @property Userprofile $user
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
            [['dateStart', 'dateEnd', 'description', 'ptPlan', 'userId'], 'required'],
            [['dateStart', 'dateEnd'], 'safe'],
            [['ptPlan', 'userId'], 'integer'],
            [['description'], 'string', 'max' => 45],
            [['ptPlan'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['ptPlan' => 'userId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['userId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateStart' => 'Data de Início',
            'dateEnd' => 'Data de Fim',
            'description' => 'Descrição',
            'ptPlan' => 'ID do Personal Trainer',
            'userId' => 'ID do Utilizador',
        ];
    }

    /**
     * Gets query for [[Planworkouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanworkouts()
    {
        return $this->hasMany(Planworkout::className(), ['planId' => 'id']);
    }

    /**
     * Gets query for [[PtPlan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPtPlan0()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'ptPlan']);
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

    public function getPt()
    {
        return $this->hasOne(User::className(), ['id' => 'ptPlan']);
    }
    
    public function getClient()
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
        return $this->hasMany(Workout::className(), ['id' => 'workoutId'])->viaTable('planworkout', ['planId' => 'id']);
    }
}
