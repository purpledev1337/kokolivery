<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Type;

class GuestController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function register() {
        $types = Type::all();
        return view('pages.register', compact('types'));
    }
    
    public function restaurant_list($city) {
        return view('pages.guest.restaurant_list',compact('city'));
    }
    
    public function restaurantDishes($id) {
        $dishes = User::find($id) -> dishes;

        return view('pages.guest.restaurantShop', compact($dishes));
    }

 
}
