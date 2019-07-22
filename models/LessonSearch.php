<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lesson;
use app\models\Group;

/**
 * LessonSearch represents the model behind the search form of `app\models\Lesson`.
 */
class LessonSearch extends Lesson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['group_id', 'time'], 'string'],
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
        $query = Lesson::find();

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
            'group_id' => $this->group_id,
            'time' => $this->time,
        ]);

        //custom complex search
        //custom group_id
        if (strlen($this->group_id)){                        
            $groups = Group::find()->select(['id', 'name'])->where(['like', 'name', $this->group_id])->all();

            if ($groups){
                foreach ($groups as $group){                                       
                    $query->orFilterWhere([
                        'group_id' => $group->id,
                    ]);                    
                }
            }
            else{
                $query->andFilterWhere(['like', 'group_id', $this->group_id]);
            }
        }
        else{
            $query->andFilterWhere(['like', 'group_id', $this->group_id]);
        }

        //custom complex search
        //custom time
        if (strlen($this->time)){                                                    
            $query->andFilterWhere(['like', 'time', strtotime($this->time)]);                              
        }
        else{
            $query->andFilterWhere(['like', 'time', $this->time]);
        }

        return $dataProvider;
    }
}
