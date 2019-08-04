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

Route::post('/test','BoardController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'BoardController@welcome')->name('welcome');

Route::get('/board/{id?}', 'BoardController@index')->name('boardList');
Route::post('/board/post', 'BoardController@post')->name('boardPost');

Route::get('/new','BoardController@new')->name('boardnew');
Route::post('/create','BoardController@create')->name('boardCreate');

Route::post('/board/good','BoardController@good')->name('boardGood');

Route::get('/login/{provider}','Auth\SocialAccountController@redirectToProvider')->name('socialLogin');
Route::get('/login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::get('/mypage', 'BoardController@mypage')->name('mypage');
Route::post('/mypage/edit', 'BoardController@editMypage')->name('editMypage');