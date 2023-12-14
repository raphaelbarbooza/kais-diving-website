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

    public static function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        $youtube_id = '';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' .  $youtube_id;
    }

}
