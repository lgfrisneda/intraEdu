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

Route::redirect('/', 'login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/cursos', 'CourseController');

    Route::resource('/usuarios', 'UserController');

    Route::get('/unidades/create/{curso}', 'LessonController@create');
    Route::post('/unidades', 'LessonController@store');
    Route::get('/unidades/{curso}', 'LessonController@show');
    Route::get('/unidades/{unidad}/edit', 'LessonController@edit');
    Route::put('/unidades/{unidad}', 'LessonController@update');
    Route::delete('/unidades/{unidad}', 'LessonController@destroy');

    Route::get('/soportes/{unidad}', 'SupportController@index');
    Route::get('/soportes/create/{unidad}', 'SupportController@create');
    Route::post('/soportes/{unidad}', 'SupportController@store');
    Route::get('/soportes/{material}/edit', 'SupportController@edit');
    Route::put('/soportes/{material}', 'SupportController@update');
    Route::delete('/soportes/{material}', 'SupportController@destroy');
});