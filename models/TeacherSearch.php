<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teacher;
use app\models\User;

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
            [['id', 'age', 'experience'], 'integer'],
            [['education'], 'safe'],
            [['user_id'], 'string'],
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

        $query->andFilterWhere(['like', 'education', $this->education])
            /*->andFilterWhere(['like', 'eduprogram_ids', $this->eduprogram_ids])*/;
        
        //custom complex search
        if (strlen($this->user_id)){                                                        
            $users = User::find()->select(['id', 'fname', 'mname', 'lname'])
                ->where(['fname' => explode(' ', $this->user_id)])
                ->orWhere(['mname' => explode(' ', $this->user_id)])
                ->orWhere(['lname' => explode(' ', $this->user_id)])
                ->orWhere(['like', 'fname', explode(' ', $this->user_id)])
                ->orWhere(['like', 'mname', explode(' ', $this->user_id)])
                ->orWhere(['like', 'lname', explode(' ', $this->user_id)])
                ->all();
                
            if ($users){                
                foreach ($users as $user){
                    $query->orFilterWhere([
                        'user_id' => $user->id,
                    ]);
                }                                
            }
            else{
                $query->andFilterWhere(['like', 'user_id', $this->user_id]);
            }            
        }
        else{
            $query->andFilterWhere(['like', 'user_id', $this->user_id]);
        }

        return $dataProvider;
    }
}
