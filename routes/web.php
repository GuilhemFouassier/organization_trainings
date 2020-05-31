<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/users', 'AdminController@users')->name('users');
Route::get('/add_user', 'AdminController@add_user')->name('add_user');
Route::post('/create_user', 'AdminController@create_user')->name('create_user');
Route::get('/edit_user/{id}', 'AdminController@edit_user')->name('edit_user');
Route::post('/update_user/{id}', 'AdminController@update_user')->name('update_user');
Route::get('/delete_user/{id}', 'AdminController@delete_user')->name('delete_user');

Route::get('/trainings', 'TrainingController@index')->name('trainings');
Route::get('/add_training', 'AdminController@add_training')->name('add_training');
Route::post('/create_training', 'AdminController@create_training')->name('create_training');
Route::get('/edit_training/{id}', 'AdminController@edit_training')->name('edit_training');
Route::post('/update_training/{id}', 'AdminController@update_training')->name('update_training');
Route::get('/delete_training/{id}', 'AdminController@delete_training')->name('delete_training');

Route::get('/sessions/{id}', 'SessionController@index')->name('sessions');
Route::get('/add_session/{id}', 'AdminController@add_session')->name('add_session');
Route::post('/create_session/{id}', 'AdminController@create_session')->name('create_session');
Route::get('/edit_session/{id}', 'AdminController@edit_session')->name('edit_session');
Route::post('/update_session/{id}', 'AdminController@update_session')->name('update_session');
Route::get('/delete_session/{id}', 'AdminController@delete_session')->name('delete_session');
Route::get('/passed_sessions', 'SessionController@passed_sessions')->name('passed_sessions');
Route::get('/sessions_to_come', 'SessionController@sessions_to_come')->name('sessions_to_come');

Route::get('/report/{id}', 'ReportController@index')->name('report');
Route::get('/add_report/{id}', 'TeacherController@add_report')->name('add_report');
Route::post('/create_report/{id}', 'TeacherController@create_report')->name('create_report');
Route::get('/edit_report/{id}', 'TeacherController@edit_report')->name('edit_report');
Route::post('/update_report/{id}', 'TeacherController@update_report')->name('update_report');
Route::get('/delete_report/{id}', 'TeacherController@delete_report')->name('delete_report');

Route::get('/registration/{id}', 'UserController@registration')->name('registration');
Route::get('/add_grade/{id}', 'TeacherController@add_grade')->name('add_grade');
Route::post('/create_grade/{id}', 'TeacherController@create_grade')->name('create_grade');
Route::get('/edit_grade/{id}', 'TeacherController@edit_grade')->name('edit_grade');
Route::post('/update_grade/{id}', 'TeacherController@update_grade')->name('update_grade');
Route::get('/delete_grade/{id}', 'TeacherController@delete_grade')->name('delete_grade');
