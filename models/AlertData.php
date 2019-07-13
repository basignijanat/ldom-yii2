<?php

namespace app\models;

use Yii;

class AlertData{
    private static $alerts = [
        '1' => [
            'content' => 'User already exists!',
            'class' => 'has-background-danger',
        ],
        '2' => [
            'content' => 'Passwords does not match!',
            'class' => 'has-background-danger',
        ],
        '3' => [
            'content' => 'The username or password is incorrect!',
            'class' => 'has-background-danger',
        ],
    ];

    public static function getAlert($code){
        if (array_key_exists($code, self::$alerts)){

            return self::$alerts[$code];
        }
        
        return false;
    }
}