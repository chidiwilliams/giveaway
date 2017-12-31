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

Route::get('/', 'IndexController@index')->name('login');

Route::get('/home', 'HomeController@index');

Route::get('login/twitter', 'SocialAuthTwitterController@redirectToProvider')->name('twitter_login');
Route::get('login/twitter/callback', 'SocialAuthTwitterController@handleProviderCallback');

Route::get('1234567890/login/', 'Auth\LoginController@showLoginForm');
Route::post('1234567890/login/', 'Auth\LoginController@login')->name('manual_login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('1234567890/register/', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('1234567890/register/', 'Auth\RegisterController@register');

// TODO: Password routes
Route::get('1234567890/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::get('/game', 'GameController@game')->name('game');

Route::get('/pledge', 'PledgeController@create')->name('pledge');
Route::post('/pledge', 'PledgeController@store')->name('ipledge');

Route::get('/play', 'PlayController@create')->name('play');
Route::post('/play', 'PlayController@store')->name('iplay');

Route::get('/test', 'TestController@test')->name('test');
Route::post('/test', 'TestController@post')->name('test_post');

Route::get('/plays', 'ApiController@plays')->name('plays');

Route::get('/users', 'TestController@users');
Route::get('/pledges', 'TestController@pledges');