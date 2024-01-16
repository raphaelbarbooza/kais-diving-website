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

Route::get('/cursos',[\App\Http\Controllers\WebsiteController::class, 'allCourses'])->name('website.all-courses');

Route::get('/curso/{course}',[\App\Http\Controllers\WebsiteController::class,'courseDetail'])->name('website.curso');

Route::get('/locais',[\App\Http\Controllers\WebsiteController::class, 'allLocations'])->name('website.locais');

Route::get('/local/{location}',[\App\Http\Controllers\WebsiteController::class, 'locationDetail'])->name('website.local');

Route::view('/contato','website.pages.contact')->name('website.contato');

