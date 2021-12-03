<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $userId
 * @property int|null $weight
 * @property int|null $height
 * @property int|null $weightLost
 * @property int|null $lightestWeight
 * @property int|null $heaviestWeight
 * @property int|null $bmi
 *
 * @property Application[] $applications
 * @property Chat[] $chats
 * @property Order[] $orders
 * @property Plan[] $plans
 * @property User $user
 * @property Workouthistory[] $workouthistories
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weight', 'height', 'weightLost', 'lightestWeight', 'heaviestWeight', 'bmi'], 'integer'],
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
            'weight' => 'Weight',
            'height' => 'Height',
            'weightLost' => 'Weight Lost',
            'lightestWeight' => 'Lightest Weight',
            'heaviestWeight' => 'Heaviest Weight',
            'bmi' => 'Bmi',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['clientId' => 'userId']);
    }

    /**
     * Gets query for [[Chats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['clientId' => 'userId']);
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
        return $this->hasMany(Plan::className(), ['clientId' => 'userId']);
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
     * Gets query for [[Workouthistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkouthistories()
    {
        return $this->hasMany(Workouthistory::className(), ['clientId' => 'userId']);
    }
}
