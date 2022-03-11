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
    // ritorna pagina con ristornati per città
    public function getRestaurants($city) {
        return view('pages.guest.restaurants',compact('city'));
    }
    // ritorna pagina con tutti i ristoranti
    public function getAllRestaurants() {
        return view('pages.guest.restaurants');
    }
    
    public function restaurantDishes($id) {
        $dishes = User::find($id) -> dishes;

        return view('pages.guest.restaurantShop', compact($dishes));
    }

 
}
