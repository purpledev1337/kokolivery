<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ApiController extends Controller
{
    public function getRestaurants() {

        $users = User::all();
        return json_encode($users);
    }

    
    public function restaurantDishesView($id) {
        $dishes = User::find($id) -> dishes;
        
        return json_encode($dishes);
    }
}
