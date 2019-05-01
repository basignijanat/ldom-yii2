<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form of `app\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age', 'experience', 'user_id'], 'integer'],
            [['name', 'education', 'eduprogram_ids'], 'safe'],
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
        $query = Teacher::find();

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
            'id' => $this->id,
            'age' => $this->age,
            'experience' => $this->experience,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])            
			->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'eduprogram_ids', $this->eduprogram_ids]);

        return $dataProvider;
    }
}
