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
    //middleware por controlador
    Route::resource('/cursos', 'CourseController');

    Route::resource('/usuarios', 'UserController');

    //middleware por ruta
    Route::get('/unidades/create/{curso}', 'LessonController@create')->middleware('permission:unidades.create');
    Route::post('/unidades', 'LessonController@store')->middleware('permission:unidades.store');
    Route::get('/unidades/{curso}', 'LessonController@show')->middleware('permission:unidades.show');
    Route::get('/unidades/{unidad}/edit', 'LessonController@edit')->middleware('permission:unidades.edit');
    Route::put('/unidades/{unidad}', 'LessonController@update')->middleware('permission:unidades.update');
    Route::delete('/unidades/{unidad}', 'LessonController@destroy')->middleware('permission:unidades.destroy');

    Route::get('/soportes/{unidad}', 'SupportController@index')->middleware('permission:soportes.index');
    Route::get('/soportes/create/{unidad}', 'SupportController@create')->middleware('permission:soportes.create');
    Route::post('/soportes/{unidad}', 'SupportController@store')->middleware('permission:soportes.store');
    Route::get('/soportes/{material}/edit', 'SupportController@edit')->middleware('permission:soportes.edit');
    Route::put('/soportes/{material}', 'SupportController@update')->middleware('permission:soportes.update');
    Route::delete('/soportes/{material}', 'SupportController@destroy')->middleware('permission:soportes.destroy');
});