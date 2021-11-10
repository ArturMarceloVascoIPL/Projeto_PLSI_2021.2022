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
 * @property User $user
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
