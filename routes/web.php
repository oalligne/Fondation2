<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::resource('compositeur', 'CompositeurController');
Route::resource('style', 'StyleController');
Route::resource('morceau', 'MorceauController');
Route::resource('extrait', 'ExtraitController');
Route::resource('typequiz', 'TypeQuizController');
Route::resource('quiz', 'QuizController');

//Route::post('contact', 'ContactController@postForm');
