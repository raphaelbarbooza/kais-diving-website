<?php

namespace App\Services;

use App\Helpers\StringHelper;
use App\Models\ShortOption;

class ShortOptionsServices
{

    public static function getClass($class){
        $options = ShortOption::where('class',$class)->get()->pluck('value','slug')->mapWithKeys(function($value, $key){
            return [$key => StringHelper::isJson($value) ? json_decode($value,true) : $value];
        })->toArray();
        return $options;
    }

    public static function setClass($class, $values){
        foreach($values as $slug => $value){
            ShortOption::updateOrCreate([
                'class' => $class,
                'slug' => $slug
            ],
            [
                'value' => is_array($value) ? json_encode($value) : $value
            ]);
        }
    }

    public static function getOption($class, $slug){
        $option = ShortOption::where('class', $class)->where('slug', $slug)->first();
        if($option)
            return StringHelper::isJson($option->getAttribute('value')) ? json_decode($option->getAttribute('value'),true) : $option->getAttribute('value');
        else
            return '';
    }

    public static function setOption($class, $slug, $value){
        ShortOption::updateOrCreate([
            'classe' => $class,
            'slug' => $slug
        ],
            [
                'value' => $value
            ]);
    }

}
