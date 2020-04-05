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
    return view('welcome');
});

//Route
// restaurant
Route::get('/restaurant/read/{id?}', 'RestaurantController@readOneView');
Route::get('/restaurant/create', function (){
    return view('restaurant.create');
});

// food

Route::get('/food/read/{restaurant_id?}', 'FoodController@readOneView');
Route::get('/food/create', function (){
    return view('food.create');
});

Route::get('/order/create', function (){
    return view('order.create');
});

Route::get('/search/restaurant', 'RestaurantController@search');