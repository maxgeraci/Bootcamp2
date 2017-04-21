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

Route::get('/home', 'HomeController@index');

Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
Route::get('/user', ['as' => 'user', 'uses' => 'UserController@index']);

Route::post('/settingsPost', ['as' => 'settingsPost', 'uses' => 'SettingsController@settingsPost']);


