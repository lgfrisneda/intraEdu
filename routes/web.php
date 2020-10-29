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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cursos', 'CourseController');

Route::get('/unidades/create/{curso}', 'LessonController@create');
Route::post('/unidades', 'LessonController@store');
Route::get('/unidades/{curso}', 'LessonController@show');
Route::get('/unidades/{unidad}/edit', 'LessonController@edit');
Route::put('/unidades/{unidad}', 'LessonController@update');
Route::delete('/unidades/{unidad}', 'LessonController@destroy');