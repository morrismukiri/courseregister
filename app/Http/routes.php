<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/course','CourseController@index');
Route::get('/course/add','CourseController@add');
Route::post('/course/add','CourseController@store');
Route::get('/course/edit/{course}','CourseController@edit');
Route::post('/course/edit/{course}','CourseController@update');
Route::get('/course/delete/{course}','CourseController@delete');

Route::get('lecturer','LecturersController@index');
Route::get('lecturer/courses/{lecturer}','LecturersController@courses');
Route::get('lecturer/edit/{lecturer}','LecturersController@edit');
Route::get('lecturer/delete/{lecturer}','LecturersController@delete');
Route::post('lecturer/edit/{lecturer}','LecturersController@update');
Route::get('lecturer/add','LecturersController@add');
Route::post('lecturer/add','LecturersController@store');