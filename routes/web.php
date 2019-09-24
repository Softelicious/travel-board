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

use App\User;

Route::get('/', 'SaveController@load');

Route::post('/save', 'SaveController@index');

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::post('/delete', 'AdminController@delete');