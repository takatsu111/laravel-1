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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'BoardController@test')->name('test');
Route::get('/board', 'BoardController@index')->name('boardList');
Route::post('/board', 'BoardController@post')->name('boardPost');
