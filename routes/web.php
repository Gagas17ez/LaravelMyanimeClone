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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/anime/table', 'animetablecontroller@show')->name('anime.table');

Route::resource('anime', 'animecontroller');

Route::resource('genre', 'genrecontroller');
Route::resource('profile', 'profilecontroller');
Route::resource('komentar', 'komentarcontroller');
Route::resource('users', 'usercontroller');
