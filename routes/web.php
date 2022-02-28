<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@home')->name('home');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/register', 'GuestController@register') -> name('register');


Route::middleware(['auth'])->prefix('post')->group(function () {
    // Route::get('/create', 'PostController@create') -> name('create');
    // Route::post('/store', 'PostController@store') -> name('store');

    // Route::get('/edit/{id}', 'PostController@edit') -> name('edit');
    // Route::post('/update/{id}', 'PostController@update') -> name('update');


    // Route::get('/delete/{id}', 'PostController@delete') -> name('delete');

});

Route::get('/api/restaurant_list', 'ApiController@getRestaurants')->name('api.restaurant_list');
Route::get('/restaurant_list', 'GuestController@restaurant_list')->name('restaurant_list');

Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
Route::get('/myDishes/{id}','HomeController@myDishes')->name('myDishes');
Route::get('/myOrders/{id}','HomeController@myOrders')->name('myOrders');




