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

Route::post('/restaurant', 'RestaurantController@create');
Route::get('/restaurant/{id}', 'RestaurantController@read');
Route::put('/restaurant/{id}', 'RestaurantController@update');
Route::delete('/restaurant/{id}', 'RestaurantController@delete');

Route::post('/food', 'FoodController@create');
Route::get('/food/{id}', 'FoodController@read');
Route::put('/food/{id}', 'FoodController@update');
Route::delete('/food/{id}', 'FoodController@delete');

Route::post('order', 'OrderController@create');

