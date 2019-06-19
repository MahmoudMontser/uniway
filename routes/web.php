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
    return view('layout\splash_screen');
});
Route::get('/w', function () {
    return view('welcome')->with(notify()->flash('hay','success'));
});
Route::get('/profile', function () {
    return view('user.profile');
})->name('profile');

Route::get('/edit_profile','Usercontroller@update_page')->name('edit_profile');
Route::post('/update','Usercontroller@update')->name('update');

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
})->name('new_trip');

Route::get('profile_create_page','User\RegisterController@create_profile_page');

Route::post('match_or_create','TripController@match_or_create')->name('match_or_create');

Route::post('subscription','TripController@trip_subscription')->name('make_trip_subscription');
Route::get('my_trips','TripController@my_trips')->name('all_user_trips');

Route::get('get_trip/{id}','TripController@get_trip')->name('get_trip');



Route::post('rating','RatingController@rate')->name('rate');




Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});
Route::view('home','user\hom')->name('home_page');
Route::view('ter','user\trip_map')->name('ter');


Route::get('home_data','TripController@my_trips')->name('home_data');

Route::get('time', function () {
    $c=new \Carbon\Carbon();
    return $c->timezone('GMT+2')->format('g:i A');;
});
