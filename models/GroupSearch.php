<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Group;
use app\models\Language;
use app\models\Teacher;
use app\models\Student;

/**
 * GroupSearch represents the model behind the search form of `app\models\Group`.
 */
class GroupSearch extends Group
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
            [['language_id', 'student_ids', 'teacher_ids'], 'string'],
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
        $query = Group::find();

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
            /*'language_id' => $this->language_id,
            'student_ids' => $this->student_ids,
            'teacher_ids' => $this->teacher_ids,*/
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        //custom complex search
        //language search
        if (strlen($this->language_id)){                
            $languages = Language::find()->select(['id', 'name'])->where(['like', 'name', $this->language_id])->all();
            
            if ($languages){                
                foreach ($languages as $language){
                    $query->orFilterWhere([
                        'language_id' => $language->id,
                    ]);
                }                
            }
            else{
                $query->andFilterWhere(['like', 'language_id', $this->language_id]);
            }
            
        }
        else{
            $query->andFilterWhere(['like', 'language_id', $this->language_id]);
        }

        return $dataProvider;
    }
}
