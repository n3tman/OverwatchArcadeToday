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

Route::get('/', 'Controller@index');

Route::get('/gamemode', 'Controller@todaysGamemode');
Route::post('/gamemode/submit', 'Controller@submitGamemode')->name('gamemode.submit');


Route::get('/login', 'Auth\LoginController@loginBlizzard');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');