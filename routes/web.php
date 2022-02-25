<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@home')->name('home');

Route::middleware(['auth'])->prefix('post')->group(function () {
    // Route::get('/create', 'PostController@create') -> name('create');
    // Route::post('/store', 'PostController@store') -> name('store');

    // Route::get('/edit/{id}', 'PostController@edit') -> name('edit');
    // Route::post('/update/{id}', 'PostController@update') -> name('update');


    // Route::get('/delete/{id}', 'PostController@delete') -> name('delete');

});