<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Register routes for the website layer
|
*/

// Home Page
Route::view('/','website.pages.home')->name('website.home');

Route::view('/sobre','website.pages.about')->name('website.about');

Route::get('/curso/{course}',[\App\Http\Controllers\WebsiteController::class,'courseDetail'])->name('website.curso');

Route::get('/contato',function (){
    dd('Contato');
})->name('website.contato');

