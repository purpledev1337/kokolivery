<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@home')->name('home');
Route::get('/api/restaurant_list', 'ApiController@getRestaurants')->name('api.restaurant_list');
Route::get('/restaurant_list', 'GuestController@restaurant_list')->name('restaurant_list');

