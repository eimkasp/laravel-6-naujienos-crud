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

Route::get('/', 'NewsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')
	->name('home')
	->middleware('auth');

Route::get('/news/create', 'NewsController@create')
	->middleware('auth')
	->name('news.create');

Route::get('/news/{id}', 'NewsController@show')->name('news.show');
Route::get('/news', 'NewsController@index')->name('news.index');



Route::post('/news/create', 'NewsController@store')->name('news.store');


Route::resource('news', 'NewsController');



Route::resource('comments', 'CommentsController');
//Route::get('news/stats', 'NewsController@stats');