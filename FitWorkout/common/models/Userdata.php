<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "userdata".
 *
 * @property int $id
 * @property string|null $timeStamp
 * @property int|null $weight
 * @property float|null $bmi
 * @property float|null $imc
 * @property int|null $userProfileId
 *
 * @property Userprofile $userProfile
 */
class Userdata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userdata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timeStamp'], 'safe'],
            [['weight', 'userProfileId'], 'integer'],
            [['bmi', 'imc'], 'number'],
            [['userProfileId'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['userProfileId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timeStamp' => 'Time Stamp',
            'weight' => 'Peso',
            'bmi' => 'BMI',
            'imc' => 'IMC',
            'userProfileId' => 'User Profile ID',
        ];
    }

    /**
     * Gets query for [[UserProfile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(Userprofile::className(), ['userId' => 'userProfileId']);
    }
}
