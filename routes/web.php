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

Route::get('/reports/{id}', 'ReportController@index')->name('reports');
