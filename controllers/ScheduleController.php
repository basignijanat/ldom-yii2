<?php

namespace app\controllers;

use Yii;
use app\components\ArrayForForm;

use app\models\Userlang;
use app\models\Teacher;
use app\models\Student;
use app\models\Group;
use app\models\Lesson;

class ScheduleController extends \yii\web\Controller
{
    public function __construct($id, $module, $config = []){		
        if (Yii::$app->user->isGuest){
            Yii::$app->response->redirect(Url::to(['/']))->send();
        }

        Userlang::SetLanguage();
        
        return parent::__construct($id, $module, $config = []);
    }
    
    public function actionIndex($group_id = null)
    {        
        $student = Student::getStudentByUserId(Yii::$app->user->identity->id);
        if ($student){
            $student_groups = Group::getGroupsByStudent($student->id);
        }
        $teacher = Teacher::getTeacherByUserId(Yii::$app->user->identity->id);
        if ($teacher){
            $teacher_groups = Group::getGroupsByTeacher($teacher->id);
        }

        if (!$group_id){
            if ($teacher_groups){
                $group_id = $teacher_groups[0]->id;                
            }
            else{
                $group_id = $student_groups[0]->id;
            }
        }
        

        return $this->render('index', [            
            'all_groups' => [                
                'teacher' => $teacher_groups,
                'student' => $student_groups,
            ],
            'current_group' => Group::getGroup($group_id),
            'lessons' => Lesson::getLessonsByGroup($group_id),
            'group_id' => $group_id,
            'teacher' => $teacher,
            'student' => $student,
        ]);
    }

}
