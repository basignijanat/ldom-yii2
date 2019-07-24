<?php

namespace app\controllers;

use Yii;

use app\models\Language;
use app\models\Student;
use app\models\Group;
use app\models\Comment;
use app\models\Userlang;

class LanguageController extends \yii\web\Controller
{
    public function __construct($id, $module, $config = []){		        
        Userlang::SetLanguage();

        if (Yii::$app->user->isGuest){
            $_SESSION['after_signup'] = '/language/'.$url;

            $this->redirect('/site/signup');
        }
        
        return parent::__construct($id, $module, $config = []);
    }
    
    public function actionIndex($url = null)
    {
        $model = $this->findModel($url);
        if ($model){
            $user_student = Student::getStudentByUserId(Yii::$app->user->identity->id);
            $new_comment = new Comment;

            if ($user_student){
                $user_groups = Group::getGroupsByStudentLanguage($user_student->id, $model->id);
                $new_comment->student_id = $user_student->id;
                $new_comment->language_id = $model->id;

                if (Yii::$app->request->post()){
                    $modelComment = new Comment;
                    $okStudentId = Yii::$app->request->post('Comment')['student_id'] == $user_student->id;
                    $okLanguageId = Yii::$app->request->post('Comment')['language_id'] == $model->id && $user_groups;
                        
                    if ($okStudentId && $okLanguageId){
                        if ($modelComment->load(Yii::$app->request->post())){                                
                            $modelComment->save();
                        }
                    }
                }
            }
                
            return $this->render('index', [
                'model' => $model,
                'user_groups' => $user_groups,
                'comments' => Comment::getCommentsByLanguage($model->id),
                'new_comment' => $new_comment,
            ]);
        }
        else{

            return $this->render('404');
        }            
    }

    protected function findModel($url)
    {
        if (($model = Language::findOne(['url' => $url])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app\messages', 'The requested page does not exist.'));
    }

}
