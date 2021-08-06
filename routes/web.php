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
    return view('show-content.anime.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('anime', 'animecontroller');
Route::resource('genre', 'genrecontroller');
Route::resource('profile', 'profilecontroller');
Route::resource('komentar', 'komentarcontroller');