<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WorkoutExercise;

/**
 * WorkoutExerciseSearch represents the model behind the search form of `common\models\WorkoutExercise`.
 */
class WorkoutExerciseSearch extends WorkoutExercise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exerciseId', 'workoutId', 'exerciseCalories', 'equipmentWeight', 'seriesSize', 'seriesNum', 'restTime'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WorkoutExercise::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'exerciseId' => $this->exerciseId,
            'workoutId' => $this->workoutId,
            'exerciseCalories' => $this->exerciseCalories,
            'equipmentWeight' => $this->equipmentWeight,
            'seriesSize' => $this->seriesSize,
            'seriesNum' => $this->seriesNum,
            'restTime' => $this->restTime,
        ]);

        return $dataProvider;
    }
}
