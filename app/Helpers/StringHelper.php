<?php

namespace App\Helpers;

class StringHelper
{

    public static function textToHtml($text){
        return str_replace("\n","<br/>",$text);
    }

    public static function onlyNumbers($string){
        return preg_replace('/\D/', '', $string);
    }

    public static function isJson($string){
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

}
