<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

use app\models\Student;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $statistics = [];

        for ($i = 7; $i >= 0; $i--){
            $date = strtotime('-'.$i.' Day');
            $statistics[$i]['date'] = date('d-m-Y', $date);
            $statistics[$i]['day_of_week'] = date('l', $date);
            $statistics[$i]['student_count'] = Student::getStudentsCountBetween(strtotime(date('d-m-Y', $date).' 00:00'), strtotime(date('d-m-Y', $date).' 23:59'));
        }

        return $this->render('index', [
            'statistics' => $statistics,
            'total_students' => Student::getTotalStudentsCount(),
        ]);
    }
}
