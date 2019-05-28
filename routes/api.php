<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('trip','API\TripController@match_or_create');
Route::get('trip_today','API\TripController@trip_today');
Route::get('trip','API\TripController@my_trips');


Route::post('subscription','API\TripController@trip_subscription');
Route::delete('subscription/{id}','API\TripController@unsubscribe');
Route::get('subscription/{id}','API\TripController@my_subscriptions');

Route::post('rating','API\RatingController@rate');


Route::get('user','API\UserController@index');




