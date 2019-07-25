<?php

namespace app\models;

use Yii;

class AlertData{
    private static $alerts = [
        '1.1' => [
            'content' => 'User already exists!',
            'class' => 'has-background-danger',
        ],
        '1.2' => [
            'content' => 'Passwords does not match!',
            'class' => 'has-background-danger',
        ],
        '1.3' => [
            'content' => 'The username or password is incorrect!',
            'class' => 'has-background-danger',
        ],
        '1.4' => [
            'content' => 'Changes have been successfully applied!',
            'class' => 'has-background-success',
        ],

        '2.1' => [
            'content' => 'Changes have been successfully applied!',
            'class' => 'alert alert-success',
        ],        
        '3.1' => [
            'content' => 'You have successfully applied for a course. We will call you back later!',
            'class' => 'alert alert-success',
        ], 
    ];

    public static function getAlert($code){
        if (array_key_exists($code, self::$alerts)){

            return self::$alerts[$code];
        }
        
        return false;
    }
}