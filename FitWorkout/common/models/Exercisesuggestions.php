<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercisesuggestions".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $caloriesBurned
 * @property int $status
 * @property int $personalTrainerId
 *
 * @property Personaltrainer $personalTrainer
 */
class Exercisesuggestions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercisesuggestions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'caloriesBurned', 'status', 'personalTrainerId'], 'required'],
            [['caloriesBurned', 'status', 'personalTrainerId'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['personalTrainerId'], 'exist', 'skipOnError' => true, 'targetClass' => Personaltrainer::className(), 'targetAttribute' => ['personalTrainerId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'caloriesBurned' => 'Calories Burned',
            'status' => 'Status',
            'personalTrainerId' => 'Personal Trainer ID',
        ];
    }

    /**
     * Gets query for [[PersonalTrainer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalTrainer()
    {
        return $this->hasOne(Personaltrainer::className(), ['userId' => 'personalTrainerId']);
    }
}
