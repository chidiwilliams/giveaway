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

Route::get('/', 'IndexController@index');

Route::get('login/twitter', 'SocialAuthTwitterController@redirectToProvider')->name('twitter_login');
Route::get('login/twitter/callback', 'SocialAuthTwitterController@handleProviderCallback');

Route::get('/game', 'GameController@game')->name('game');
Route::get('/pledge', 'PledgeController@pledge')->name('pledge');
Route::get('/play', 'PlayController@play')->name('play');
