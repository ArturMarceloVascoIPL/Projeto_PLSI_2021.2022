<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercisecategory".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property Exercise[] $exercises
 */
class Exercisecategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercisecategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
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
            'name' => 'Nome da Categoria',
            'description' => 'Descrição',
        ];
    }

    /**
     * Gets query for [[Exercises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercises()
    {
        return $this->hasMany(Exercise::className(), ['categoryId' => 'id']);
    }
}
