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
    return view('auth/login');
});

Auth::routes();

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/location', 'HomeController@location')->name('location');

//facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//linkedin
Route::get('login/linkedin', 'Auth\LinkedinController@redirectToProvider');
Route::get('login/linkedin/callback', 'Auth\LinkedinController@handleProviderCallback');

//instagram
Route::get('login/instagram', 'Auth\InstagramController@redirectToProvider');
Route::get('login/instagram/callback', 'Auth\InstagramController@handleProviderCallback');

//twitter
Route::get('login/twitter', 'Auth\TwitterController@redirectToProvider');
Route::get('login/twitter/callback', 'Auth\TwitterController@handleProviderCallback');

//pinterest
Route::get('login/pinterest', 'Auth\PinterestController@redirectToProvider');
Route::get('login/pinterest/callback', 'Auth\PinterestController@handleProviderCallback');

//google
Route::get('login/google', 'Auth\GoogleController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');
Route::get('home/search', 'HomeController@search')->name('home.search');
Route::get('home/friend_request', 'HomeController@friend_request')->name('home.friend_request');
Route::get('home/create_group', 'HomeController@create_group')->name('home.create_group');
Route::get('home/invite_to_group', 'HomeController@invite_to_group')->name('home.invite_to_group');