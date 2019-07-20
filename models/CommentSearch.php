<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

use app\models\User;
use app\models\Student;
use app\models\Language;

/**
 * CommentSearch represents the model behind the search form of `app\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['content'], 'safe'],
            [['student_id', 'language_id'], 'string'],
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
        $query = Comment::find();

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
            //'student_id' => $this->student_id,
            'language_id' => $this->language_id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);
        
        // custom complex search
        // user search
        if (strlen($this->student_id)){                                                        
            $users = User::find()->select(['id', 'fname', 'mname', 'lname'])
                ->where(['fname' => explode(' ', $this->student_id)])
                ->orWhere(['mname' => explode(' ', $this->student_id)])
                ->orWhere(['lname' => explode(' ', $this->student_id)])
                ->orWhere(['like', 'fname', explode(' ', $this->student_id)])
                ->orWhere(['like', 'mname', explode(' ', $this->student_id)])
                ->orWhere(['like', 'lname', explode(' ', $this->student_id)])
                ->all();
                
            if ($users){                
                foreach ($users as $user){
                    $query->orFilterWhere([
                        'student_id' => Student::find()
                            ->select(['id', 'user_id'])
                            ->where(['user_id' => $user->id])
                            ->one()['id'],
                    ]);
                }                                
            }
            else{
                $query->andFilterWhere(['like', 'student_id', $this->student_id]);
            }
            
        }
        else{
            $query->andFilterWhere(['like', 'student_id', $this->student_id]);
        }

        // language search
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
