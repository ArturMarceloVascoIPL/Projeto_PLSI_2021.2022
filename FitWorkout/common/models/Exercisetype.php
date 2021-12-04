<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercisetype".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property Exercise[] $exercises
 */
class Exercisetype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercisetype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
        ];
    }

    /**
     * Gets query for [[Exercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercises()
    {
        return $this->hasMany(Exercise::className(), ['typeId' => 'id']);
    }
}
