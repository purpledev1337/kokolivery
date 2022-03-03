<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@home')->name('home');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/register', 'GuestController@register') -> name('register');
Route::post('/register', 'Auth\RegisterController@register');


Route::middleware(['auth'])->prefix('post')->group(function () {
    // Route::get('/create', 'PostController@create') -> name('create');
    // Route::post('/store', 'PostController@store') -> name('store');

    // Route::get('/edit/{id}', 'PostController@edit') -> name('edit');
    // Route::post('/update/{id}', 'PostController@update') -> name('update');


    // Route::get('/delete/{id}', 'PostController@delete') -> name('delete');

});


Route::middleware(['auth'])->prefix('auth')->group(function () {
    // Route::get('restaurant/edit/{id}, AuthController@restaurantEdit')->name('restaurant.edit');

    Route::get('dish/create', 'AuthController@dishCreate')->name('dish.create');
    Route::post('dish/store', 'AuthController@dishStore')->name('dish.store');
    Route::get('restaurant/delete', 'AuthController@restaurantDelete')->name('restaurant.delete');
    Route::get('restaurant/edit', 'AuthController@restaurantEdit')->name('restaurant.edit');
    Route::post('restaurant/update', 'AuthController@restaurantUpdate')->name('restaurant.update');

    Route::get('dish/edit/{id}', 'AuthController@dishEdit') -> name('dish.edit');
    Route::post('dish/update/{id}', 'AuthController@dishUpdate') -> name('dish.update');

    Route::get('dish/delete/{id}', 'AuthController@dishDelete') -> name('dish.delete');
    Route::get('dish/visibility/{id}', 'AuthController@dishVisibility') -> name('dish.visibility');

});

Route::get('restaurant/shop/{id}', 'GuestController@restaurantDishes') -> name('guest.restaurantDishes');
Route::get('/view/restaurant/shop/{id}', 'GuestController@restaurantDishesView') -> name('guest.restaurantDishes');
Route::get('/api/restaurant_list', 'ApiController@getRestaurants')->name('api.restaurant_list');
Route::get('/restaurant_list', 'GuestController@restaurant_list')->name('restaurant_list');

Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
Route::get('/myDishes','HomeController@myDishes')->name('myDishes');
Route::get('/myOrders','HomeController@myOrders')->name('my_orders');




