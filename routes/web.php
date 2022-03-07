<?php

use Illuminate\Support\Facades\Route;

Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
});

Route::get('/', 'GuestController@home')->name('home');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/register', 'GuestController@register') -> name('register');
Route::post('/register', 'Auth\RegisterController@register');

// auth route
Route::middleware(['auth'])->prefix('auth')->group(function () {
    Route::get('/dashboard','AuthController@dashboard')->name('dashboard');
    Route::get('/myDishes','AuthController@myDishes')->name('myDishes');
    Route::get('/myOrders','AuthController@myOrders')->name('my_orders');

    // group restaurant
    Route::prefix('restaurant') -> group(function(){
        Route::get('/delete', 'AuthController@restaurantDelete')->name('restaurant.delete');
        Route::get('/edit', 'AuthController@restaurantEdit')->name('restaurant.edit');
        Route::post('/update', 'AuthController@restaurantUpdate')->name('restaurant.update');
    });

    // group dish
    Route::prefix('dish') -> group(function(){

        Route::get('/create', 'AuthController@dishCreate')->name('dish.create');
        Route::post('/store', 'AuthController@dishStore')->name('dish.store');

        Route::get('/edit/{id}', 'AuthController@dishEdit') -> name('dish.edit');
        Route::post('/update/{id}', 'AuthController@dishUpdate') -> name('dish.update');
        
        Route::get('/visibility/{id}', 'AuthController@dishVisibility') -> name('dish.visibility');
        Route::get('/delete', 'AuthController@dishDelete') -> name('dish.delete');
    });


});
// /auth route


Route::get('restaurant/shop/{id}', 'GuestController@restaurantDishes') -> name('restaurant.shop');
Route::get('/restaurant_list', 'GuestController@restaurant_list')->name('restaurant_list');

// api route
Route::prefix('api') -> group(function(){
    Route::get('/restaurant_list', 'ApiController@getRestaurants')->name('api.restaurant_list');
    Route::get('/view/restaurant/shop/{id}', 'ApiController@restaurantDishesView') -> name('guest.restaurantDishes');
});

Route::get('stripe', 'StripePaymentController@stripe') -> name('stripe.view');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');






