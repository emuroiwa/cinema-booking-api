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
    Route::apiResource('customer', 'API\CustomerController');
    Route::apiResource('movie', 'API\MovieController');
    Route::apiResource('showing', 'API\ShowingController');
    Route::apiResource('booking', 'API\BookingController');
    Route::delete('booking', 'API\BookingController@deleteBooking');
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@clearwaste.com'
    ], 404);
});
