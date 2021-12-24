<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $approved
 * @property int $typeId
 * @property int $categoryId
 *
 * @property Exercisecategory $category
 * @property Exercisetype $type
 * @property Workoutexercise[] $workoutexercises
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
            [['name', 'typeId', 'categoryId'], 'required'],
            [['approved', 'typeId', 'categoryId'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
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
            'name' => 'Nome',
            'description' => 'Descrição',
            'approved' => 'Aprovado',
            'typeId' => 'ID do Tipo',
            'categoryId' => 'ID da Categoria',
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
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Exercisetype::className(), ['id' => 'typeId']);
    }

    /**
     * Gets query for [[Workoutexercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutexercises()
    {
        return $this->hasMany(Workoutexercise::className(), ['exerciseId' => 'id']);
    }

    /**
     * Gets query for [[Workouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkouts()
    {
        return $this->hasMany(Workout::className(), ['id' => 'workoutId'])->viaTable('workoutexercise', ['exerciseId' => 'id']);
    }
}
