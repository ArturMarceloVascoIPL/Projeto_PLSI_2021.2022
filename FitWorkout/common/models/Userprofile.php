<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property int $userId
 * @property string|null $address
 * @property int|null $nif
 * @property string|null $postalCode
 * @property string|null $city
 *
 * @property Chatmessage[] $chatmessages
 * @property Chatmessage[] $chatmessages0
 * @property Exercisehistory[] $exercisehistories
 * @property Order[] $orders
 * @property Plan[] $plans
 * @property Plan[] $plans0
 * @property Ptapplication[] $ptapplications
 * @property User $user
 * @property Userdata[] $userdatas
 * @property Workout[] $workouts
 */
class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nif'], 'integer', 'min' => 111111111, 'max' => 999999999],
            [['address'], 'string', 'max' => 255],
            [['postalCode', 'city'], 'string', 'max' => 45],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'ID do Utilizador',
            'address' => 'Morada',
            'nif' => 'NIF',
            'postalCode' => 'Código Postal',
            'city' => 'Localidade',
        ];
    }

    /**
     * Gets query for [[Chatmessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatmessages()
    {
        return $this->hasMany(Chatmessage::className(), ['from' => 'userId']);
    }

    /**
     * Gets query for [[Chatmessages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChatmessages0()
    {
        return $this->hasMany(Chatmessage::className(), ['to' => 'userId']);
    }

    /**
     * Gets query for [[Exercisehistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercisehistories()
    {
        return $this->hasMany(Exercisehistory::className(), ['userId' => 'userId']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['clientId' => 'userId']);
    }

    /**
     * Gets query for [[Plans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['ptPlan' => 'userId']);
    }

    /**
     * Gets query for [[Plans0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlans0()
    {
        return $this->hasMany(Plan::className(), ['userId' => 'userId']);
    }

    /**
     * Gets query for [[Ptapplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPtapplications()
    {
        return $this->hasMany(Ptapplication::className(), ['userId' => 'userId']);
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
     * Gets query for [[Userdatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserdatas()
    {
        return $this->hasMany(Userdata::className(), ['userProfileId' => 'userId']);
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
