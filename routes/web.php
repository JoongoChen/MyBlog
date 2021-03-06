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

Route::get('/user/password','UsersController@password');
Route::post('/user/change_pwd','UsersController@changePwd');

Route::get('/user/email/verify/{token}','UsersController@emailVerify')->name('email.verify');

Route::get('/questions','QuestionsController@index');