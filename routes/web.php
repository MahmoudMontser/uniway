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
    return view('layout/splash_screen');
});
Route::get('login/google', 'User\LoginController@redirectToProvider')->name('google_login');
Route::get('login/google/callback', 'User\LoginController@handleProviderCallback');
Route::get('login/facebook', 'User\LoginController@fredirectToProvider')->name('facebook_login');;
Route::get('login/facebook/callback', 'User\LoginController@fhandleProviderCallback');
Route::get('login_page', function (){return view('user/login');})->name('login_page');
Route::post('login','User\LoginController@login')->name('login');

Route::get('register_page', function (){return view('user/register');})->name('register_page');
Route::post('register','User\RegisterController@register')->name('register');

Route::get('/d', function () {
    return view('user/directions');
});

Route::get('profile_create_page','User\RegisterController@create_profile_page');

Route::post('match_or_create','TripController@match_or_create')->name('match_or_create');

Route::post('subscription','TripController@trip_subscription')->name('make_trip_subscription');
Route::get('my_trips','API\TripController@my_trips')->name('all_user_trips');
