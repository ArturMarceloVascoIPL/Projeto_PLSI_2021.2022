<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $caloriesBurned
 * @property int $typeId
 * @property int $categoryId
 *
 * @property Exercisecategory $category
 * @property Exerciseworkout[] $exerciseworkouts
 * @property Exercisetype $type
 * @property Workout[] $workouts
 */
class Exercise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'caloriesBurned', 'typeId', 'categoryId'], 'required'],
            [['caloriesBurned', 'typeId', 'categoryId'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Exercisecategory::className(), 'targetAttribute' => ['categoryId' => 'id']],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => Exercisetype::className(), 'targetAttribute' => ['typeId' => 'id']],
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
            'typeId' => 'Type ID',
            'categoryId' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Exercisecategory::className(), ['id' => 'categoryId']);
    }

    /**
     * Gets query for [[Exerciseworkouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExerciseworkouts()
    {
        return $this->hasMany(Exerciseworkout::className(), ['exerciseId' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Exercisetype::className(), ['id' => 'typeId']);
    }

    /**
     * Gets query for [[Workouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkouts()
    {
        return $this->hasMany(Workout::className(), ['id' => 'workoutId'])->viaTable('exerciseworkout', ['exerciseId' => 'id']);
    }
}
