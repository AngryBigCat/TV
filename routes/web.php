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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/chart', 'ChartController@index')->name('chart');

Route::get('/luck', 'LuckController@index')->name('luck');

Route::get('/luck/{id}', 'LuckController@show');


//三位抽奖用户
Route::post('/drawLucky', 'LuckController@drawLucky')->name('drawLucky');


Auth::routes();


