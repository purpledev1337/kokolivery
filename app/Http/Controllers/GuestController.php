<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\User;

class GuestController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function register() {
        return view('pages.register');
    }
    
    public function restaurant_list() {
        return view('pages.restaurant_list');
    }
    
    public function restaurantDishes($id) {
        $dishes = User::find($id) -> dishes;
        return view('pages.restaurantShop', compact($dishes));
    }
}
