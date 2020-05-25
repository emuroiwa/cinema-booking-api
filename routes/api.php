<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
    //customer endpoints
    Route::apiResource('customer', 'API\CustomerController');
   
    //movie endpoints
    Route::post('movie', 'API\MovieController@store');
    Route::put('movie', 'API\MovieController@update');
    Route::delete('movie', 'API\MovieController@delete');
    //showing endpoints
    Route::post('showing', 'API\ShowingController@store');
    Route::put('showing', 'API\ShowingController@update');
    Route::delete('showing', 'API\ShowingController@delete');
    //showing endpoints
    Route::post('booking', 'API\BookingController@store');
    Route::put('booking', 'API\BookingController@update');
    Route::delete('booking', 'API\BookingController@deleteBooking');
});
