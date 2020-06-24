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

Auth::routes();

Route::get('/', 'AppController@index')->name('app');
Route::get('/all', 'AppController@index')->name('app');
Route::get('/active', 'AppController@index')->name('app');
Route::get('/completed', 'AppController@index')->name('app');