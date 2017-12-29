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

Route::get('/home', 'HomeController@index');

Route::get('login/twitter', 'SocialAuthTwitterController@redirectToProvider')->name('twitter_login');
Route::get('login/twitter/callback', 'SocialAuthTwitterController@handleProviderCallback');

Auth::routes();	

Route::get('/game', 'GameController@game')->name('game');

Route::get('/pledge', 'PledgeController@create')->name('pledge');
Route::post('/pledge', 'PledgeController@store')->name('ipledge');

Route::get('/play', 'PlayController@create')->name('play');
Route::post('/play', 'PlayController@store')->name('iplay');

Route::get('/test', 'TestController@test')->name('test');
Route::post('/test', 'TestController@post')->name('test_post');

Route::get('/plays', 'ApiController@plays')->name('plays');