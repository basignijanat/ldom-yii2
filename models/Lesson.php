<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property int $group_id
 * @property int $time
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public $time_raw;
    public $date_raw;

    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id'], 'required'],
            [['group_id', 'time'], 'integer'],
            [['time_raw', 'date_raw'], 'required'],
            [['time_raw', 'date_raw'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\admin', 'ID'),
            'group_id' => Yii::t('app\admin', 'Group'),
            'time' => Yii::t('app\admin', 'Time'),
        ];
    }

    public function beforeSave($insert){
        if (parent::beforeSave($insert)){            
			$this->time = strtotime($this->date_raw.' '.$this->time_raw);
            
            return true;
        }
        
        return false;       
    }

    public static function getLessonsByGroup($group_id){

        return self::find()->where(['group_id' => $group_id])->all();
    }
}
